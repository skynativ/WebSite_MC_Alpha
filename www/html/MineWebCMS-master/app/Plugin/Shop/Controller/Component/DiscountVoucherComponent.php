<?php

class DiscountVoucherComponent extends Object
{

    static private $items;
    static private $categories;

    private $controller;

    function shutdown($controller)
    {
    }

    function beforeRender($controller)
    {
    }

    function beforeRedirect()
    {
    }

    function initialize($controller)
    {
        // Verification des réductions actuelles
        // suppression si la date de fin est passé

        $this->controller = $controller;

        $this->Voucher = ClassRegistry::init('Shop.Voucher');

        $get_vouchers = $this->Voucher->find('all');
        foreach ($get_vouchers as $k) {
            $end = strtotime($k['Voucher']['end_date']);
            if ($end < strtotime('now')) {
                $this->Voucher->delete($k['Voucher']['id']);
            }
        }
    }

    function startup($controller)
    {
    }

    function getItemNameById($id)
    {
        if (empty(self::$items)) {
            $this->Item = ClassRegistry::init('Shop.Item');
            $items = $this->Item->find('all');
            foreach ($items as $key => $value) {
                self::$items[$value['Item']['id']] = $value['Item']['name'];
            }
        }
        return self::$items[$id];
    }

    function getCategoryNameById($id)
    {
        if (empty(self::$categories)) {
            $this->Category = ClassRegistry::init('Shop.Category');
            $categories = $this->Category->find('all');
            foreach ($categories as $key => $value) {
                self::$categories[$value['Category']['id']] = $value['Category']['name'];
            }
        }
        return self::$categories[$id];
    }

    function get_vouchers()
    { // affiche dans une alert info les promotions en cours si elle doivent être affichées
        $this->Lang = $this->controller->Lang;
        $this->Configuration = $this->controller->Configuration;
        // le fichier de langue
        $this->Voucher = ClassRegistry::init('Shop.Voucher'); // le model principal
        $search_vouchers = $this->Voucher->find('all'); // le cherche les promos
        if (!empty($search_vouchers)) { // si il y a une promo en cours
            foreach ($search_vouchers as $k) { // un foreach si il y en a plusieurs
                $voucher = $k['Voucher'];
                if ($voucher['affich'] == 1) { // si on doit l'afficher, sinon je retourne rien
                    if ((!isset($voucher['start_date']) || empty($voucher['start_date'])) || (time() >= strtotime($voucher['start_date']))) {

                        $voucher['effective_on'] = unserialize($voucher['effective_on']); // j'unserilise le effective_on qui est un array

                        $return = '<div class="alert alert-info"><i class="fa fa-shopping-cart"></i> '; // début du message

                        $langVars = array();

                        if ($voucher['effective_on']['type'] == 'categories') { // si cela concerne une catégorie

                            if (count($voucher['effective_on']['value']) == 1) { // combien de catégories concernée ?
                                $langMSG = 'SHOP__VOUCHER_MSG_ONE_CATEGORY'; // plusieurs
                                $langVars['{CATEGORY}'] = '"' . $this->getCategoryNameById($voucher['effective_on']['value'][0]) . '"';
                            } else {
                                $langMSG = 'SHOP__VOUCHER_MSG_MANY_CATEGORIES'; // plusieurs

                                foreach ($voucher['effective_on']['value'] as $key => $value) {
                                    $voucher['effective_on']['value'][$key] = $this->getCategoryNameById($value);
                                }

                                $langVars['{CATEGORIES}'] = '"' . implode('", "', $voucher['effective_on']['value']) . '"';
                            }

                        } elseif ($voucher['effective_on']['type'] == 'items') { // si cela concerne un article

                            if (count($voucher['effective_on']['value']) == 1) { // combien de catégories concernée ?
                                $langMSG = 'SHOP__VOUCHER_MSG_ONE_ITEM'; // plusieurs
                                $langVars['{ITEM}'] = '"' . $this->getItemNameById($voucher['effective_on']['value'][0]) . '"';
                            } else {
                                $langMSG = 'SHOP__VOUCHER_MSG_MANY_ITEMS'; // plusieurs

                                foreach ($voucher['effective_on']['value'] as $key => $value) {
                                    $voucher['effective_on']['value'][$key] = $this->getItemNameById($value);
                                }

                                $langVars['{ITEMS}'] = implode('", "', $voucher['effective_on']['value']);
                            }

                        } elseif ($voucher['effective_on']['type'] == 'all') { // si cela concerne toute la boutique
                            $langMSG = 'SHOP__VOUCHER_MSG_ALL';
                        }

                        $langVars['{CODE}'] = $voucher['code'];

                        $langVars['{REDUCTION}'] = ' -' . $voucher['reduction'];
                        if ($voucher['type'] == 1) {
                            $langVars['{REDUCTION}'] .= '%';
                        } elseif ($voucher['type'] == 2) {
                            $langVars['{REDUCTION}'] .= ' ' . $this->Configuration->getMoneyName();
                        }

                        $return .= $this->Lang->get($langMSG, $langVars);

                        $return .= '</div>';

                        echo $return;

                    } else {
                        $return = '<div class="alert alert-info"><i class="fa fa-shopping-cart"></i> '; // début du message

                        $reduction = ' -' . $voucher['reduction'];
                        if ($voucher['type'] == 1) {
                            $reduction .= '%';
                        } elseif ($voucher['type'] == 2) {
                            $reduction .= ' ' . $this->Configuration->getMoneyName();
                        }

                        $return .= $this->Lang->get('SHOP__VOUCHER_MSG_SOON', array('{REDUCTION}' => $reduction, '{START_DATE}' => $this->Lang->date($voucher['start_date'])));

                        $return .= '</div>';

                        echo $return;
                    }

                }
            }
        }
    }

    public $vouchersUsed = array();

    private function canUse($voucher)
    {
        if (time() < strtotime($voucher['start_date']))
            return false;
        if (empty($voucher['limit']))
            return true;
        $userId = $this->controller->User->getKey('id');
        $usedBy = unserialize($voucher['used']);
        if (!is_array($usedBy) || empty($usedBy))
            return true;
        if ($voucher['limit_type'] == 2 && $voucher['limit'] > count($usedBy)) // Limit global
            return true;
        $count = array_count_values($usedBy);
        if ($voucher['limit_type'] == 1 && !isset($count[$userId])) // Limit by users
            return true;
        if ($voucher['limit_type'] == 1 && $voucher['limit'] > $count[$userId]) // Limit by users
            return true;
        return false;
    }

    function getNewPrice($item_id, $code)
    { // donne le nouveau prix de l'item si il est concerné par une réduction
        $this->Voucher = ClassRegistry::init('Shop.Voucher');
        $findVoucher = $this->Voucher->find('first', array('conditions' => array('code' => $code)));
        if (!empty($findVoucher)) { // si il y a une promo en cours

            $findVoucher['Voucher']['effective_on'] = unserialize($findVoucher['Voucher']['effective_on']);

            if ($this->canUse($findVoucher['Voucher'])) { // On peux l'utiliser

                // On cherche les infos de l'article
                $this->Item = ClassRegistry::init('Shop.Item');
                $findItem = $this->Item->find('first', array('conditions' => array('id' => $item_id)));

                if (empty($findItem)) {
                    return array('status' => false, 'error' => 3); // on trouve pas l'article
                }

                $itemPrice = $findItem['Item']['price'];
                $itemCategoryID = $findItem['Item']['category'];

                // On prépare le prix si pas de modifications
                $price = $itemPrice;

                // On cherche si la catégorie est concerné par la promo
                if ($findVoucher['Voucher']['effective_on']['type'] == 'categories') { // Si y'a des catégories concernées
                    if (in_array($itemCategoryID, $findVoucher['Voucher']['effective_on']['value'])) { // Si celle de l'article l'est

                        // On change le prix
                        if ($findVoucher['Voucher']['type'] == 1) { // si c'est -x%
                            $reduction = 1 - $findVoucher['Voucher']['reduction'] / 100;
                            $price = $itemPrice * $reduction;
                        } elseif ($findVoucher['Voucher']['type'] == 2) { // si c'est -x€
                            $price = $itemPrice - $findVoucher['Voucher']['reduction'];
                        }


                    }
                }

                // On cherche si l'article est concerné par la promo
                if ($findVoucher['Voucher']['effective_on']['type'] == 'items') { // Si y'a des articles concernés
                    if (in_array($item_id, $findVoucher['Voucher']['effective_on']['value'])) { // Si l'article l'est

                        // On change le prix
                        if ($findVoucher['Voucher']['type'] == 1) { // si c'est -x%
                            $reduction = 1 - $findVoucher['Voucher']['reduction'] / 100;
                            $price = $itemPrice * $reduction;
                        } elseif ($findVoucher['Voucher']['type'] == 2) { // si c'est -x€
                            $price = $itemPrice - $findVoucher['Voucher']['reduction'];
                        }


                    }
                }

                // On vérifie que la promo ne concerne pas toute la boutique
                if ($findVoucher['Voucher']['effective_on']['type'] == 'all') { // Si y'a des catégories concernées
                    // On change le prix
                    if ($findVoucher['Voucher']['type'] == 1) { // si c'est -x%
                        $reduction = 1 - $findVoucher['Voucher']['reduction'] / 100;
                        $price = $itemPrice * $reduction;
                    } elseif ($findVoucher['Voucher']['type'] == 2) { // si c'est -x€
                        $price = $itemPrice - $findVoucher['Voucher']['reduction'];
                    }
                }

                // On retourne le prix
                return array('status' => true, 'price' => $price);

            } else {
                return array('status' => false, 'error' => 2); // on a pas le droit
            }
        } else {
            return array('status' => false, 'error' => 1);  //on trouve pas la promo
        }
    }

    function set_used($user_id, $code, $voucher_used_count = 1)
    {
        $this->Voucher = ClassRegistry::init('Shop.Voucher');
        $search_vouchers = $this->Voucher->find('all', array('conditions' => array('code' => $code)));
        if (!empty($search_vouchers)) {

            $used = unserialize($search_vouchers[0]['Voucher']['used']);
            $i = 0;
            while ($i < $voucher_used_count) {
                $used[] = $user_id;
                $i++;
            }
            $used = serialize($used);

            $this->Voucher->read(null, $search_vouchers[0]['Voucher']['id']);
            $this->Voucher->set(array('used' => $used));
            return $this->Voucher->save();
        } else {
            return false;
        }
    }
}
