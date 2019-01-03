<?php

class Item extends ShopAppModel
{

    public function checkPrerequisites($item, $user_id)
    {
        $prerequisites = (isset($item['prerequisites_type']) && ($item['prerequisites_type'] == 1 || $item['prerequisites_type'] == 2)) ? true : false;
        if ($prerequisites) {
            $prerequisites_type = $item['prerequisites_type'];
            $prerequisites = @unserialize($item['prerequisites']);

            if (!is_bool($prerequisites) && !empty($prerequisites)) {

                $this->ItemsBuyHistory = ClassRegistry::init('Shop.ItemsBuyHistory');
                $prerequisites_items = array();
                $prerequisites_items_buyed = array();

                foreach ($prerequisites as $key => $value) {

                    $findItemRequired = $this->find('first', array('conditions' => array('id' => $value)));
                    if (empty($findItemRequired)) {
                        continue;
                    }

                    $findHistory = $this->ItemsBuyHistory->find('first', array('conditions' => array('user_id' => $user_id, 'item_id' => $findItemRequired['Item']['id'])));
                    if (empty($findHistory)) {
                        $prerequisites_items[] = $findItemRequired['Item']['name'];
                        $prerequisites_items_buyed[] = false;
                        continue;
                    }

                    $prerequisites_items_buyed[] = true;

                }

                if ($prerequisites_type == 1 && in_array(false, $prerequisites_items_buyed)) {
                    $prerequisites_items_list = '<i>' . implode('</i>, <i>', $prerequisites_items) . '</i>';
                    return array('error' => 1, 'items_list' => $prerequisites_items_list);
                }

                if ($prerequisites_type == 2 && !in_array(true, $prerequisites_items_buyed)) {
                    $prerequisites_items_list = '<i>' . implode('</i>, <i>', $prerequisites_items) . '</i>';
                    return array('error' => 2, 'items_list' => $prerequisites_items_list);
                }

            }

        }
        return true;
    }

    public function getReductionWithReductionalItems($item, $user_id)
    {
        $reduction = 0;
        if (empty($item['reductional_items']) || !is_array(($reductionsItems = unserialize($item['reductional_items']))))
            return $reduction;

        foreach ($reductionsItems as $itemId) {
            $findItem = $this->find('first', array('conditions' => array('id' => $itemId)));
            if (empty($findItem))
                continue;
            $findItem = $findItem['Item'];

            $this->ItemsBuyHistory = ClassRegistry::init('Shop.ItemsBuyHistory');
            $findHistory = $this->ItemsBuyHistory->find('first', ['conditions' => [
                'user_id' => $user_id,
                'item_id' => $findItem['id']
            ]]);
            if (empty($findHistory))
                    continue;
            $reduction += $findItem['price'];
        }
        return $reduction;
    }

}
