<?php

class ShopController extends ShopAppController
{

    public $components = array('Session', 'Shop.DiscountVoucher', 'History');

    /*
    * ======== Page principale de la boutique ===========
    */

    function index($category = false)
    { // Index de la boutique

        $title_for_layout = $this->Lang->get('SHOP__TITLE');
        if ($category) {
            $this->set(compact('category'));
        }
		
        $this->layout = $this->Configuration->getKey('layout'); // On charge le thème configuré
        $this->loadModel('Shop.Item'); // le model des articles
        $this->loadModel('Shop.Category'); // le model des catégories
        $search_items = $this->Item->find('all', array(
			'order' => 'order',
            'conditions' => array(
                'OR' => array(
                    'display IS NULL',
                    'display = 1'
                )
            )
        )); // on cherche tous les items et on envoie à la vue
	$vanow = 0;
	$this->loadModel('Shop.DedipassHistory');
	$this->loadModel('Shop.PaypalHistory');
	$this->loadModel('Shop.StarpassHistory');
	$this->loadModel('Shop.PaysafecardHistory');
	$histories_dedi = $this->DedipassHistory->find('all',['conditions' => ['created LIKE' => date('Y') . '-' . date('m') . '-%']]);
	$histories_paypal = $this->PaypalHistory->find('all',['conditions' => ['created LIKE' => date('Y') . '-' . date('m') . '-%']]);
	$histories_pay = $this->PaysafecardHistory->find('all',['conditions' => ['created LIKE' => date('Y') . '-' . date('m') . '-%']]);
	$histories_star = $this->StarpassHistory->find('all',['conditions' => ['created LIKE' => date('Y') . '-' . date('m') . '-%']]);
	foreach ($histories_dedi as $value){
		$vanow +=  floatval($value["DedipassHistory"]["credits_gived"]);
	}
	foreach ($histories_paypal as $value){
		$vanow +=  floatval($value["PaypalHistory"]["payment_amount"]);
	}
	foreach ($histories_pay as $value){
		$vanow +=  floatval($value["PaysafecardHistory"]["credits_gived"]);
	}
	foreach ($histories_star as $value){
		$vanow +=  floatval($value["StarpassHistory"]["credits_gived"]);
	}
	$this->loadModel('Shop.ItemsConfig');
	$vagoal = $this->ItemsConfig->find('all');
	$vagoal = @$vagoal[0]["ItemsConfig"]["goal"];
	if ($vanow > $vagoal){
		$vanow = $vagoal;
	}
	if ($vagoal != 0){
		$vawidth = round((str_replace(",", '.', $vanow*100/$vagoal)));
	}
		
        $search_categories = $this->Category->find('all'); // on cherche toutes les catégories et on envoie à la vue

        $search_first_category = $this->Category->find('first'); //
        $search_first_category = @$search_first_category['Category']['id']; //

        $this->loadModel('Shop.Paypal');
        $paypal_offers = $this->Paypal->find('all');

        $this->loadModel('Shop.Starpass');
        $starpass_offers = $this->Starpass->find('all');

        $this->loadModel('Shop.DedipassConfig');
        $findDedipassConfig = $this->DedipassConfig->find('first');
        $dedipass = (!empty($findDedipassConfig) && isset($findDedipassConfig['DedipassConfig']['status']) && $findDedipassConfig['DedipassConfig']['status']) ? true : false;

        $this->loadModel('Shop.Paysafecard');
        $paysafecard_enabled = $this->Paysafecard->find('all', array('conditions' => array('amount' => '0', 'code' => 'disable', 'user_id' => 0, 'created' => '2000-01-01 15:00:00')));
        if (!empty($paysafecard_enabled)) {
            $paysafecard_enabled = false;
        } else {
            $paysafecard_enabled = true;
        }

        $money = 0;
        if ($this->isConnected) {
            $money = $this->User->getKey('money') . ' ';
            $money += ($this->User->getKey('money') == 1 OR $this->User->getKey('money') == 0) ? $this->Configuration->getMoneyName(false) : $this->Configuration->getMoneyName();
        }

        $vouchers = $this->DiscountVoucher;

        $singular_money = $this->Configuration->getMoneyName(false);
        $plural_money = $this->Configuration->getMoneyName();

        $this->set(compact('dedipass', 'vagoal', 'vawidth', 'paysafecard_enabled', 'money', 'starpass_offers', 'paypal_offers', 'search_first_category', 'search_categories', 'search_items', 'title_for_layout', 'vouchers', 'singular_money', 'plural_money'));
    }

    /*
    * ======== Affichage d'un article dans le modal ===========
    */

    function ajax_get($id)
    { // Permet d'afficher le contenu du modal avant l'achat (ajax)
        $this->response->type('json');
        $this->autoRender = false;
        if ($this->isConnected AND $this->Permissions->can('CAN_BUY')) { // si l'utilisateur est connecté
            $this->loadModel('Shop.Item'); // je charge le model des articles
            $search_item = $this->Item->find('all', array('conditions' => array('id' => $id))); // je cherche l'article selon l'id
            $money = ($search_item['0']['Item']['price'] == 1) ? $this->Configuration->getMoneyName(false) : $this->Configuration->getMoneyName();// je dis que la variable $money = le nom de la money au pluriel ou singulier selon le prix
            if (!empty($search_item[0]['Item']['servers'])) {
                $this->loadModel('Server');
                $search_servers_list = $this->Server->find('all');
                foreach ($search_servers_list as $key => $value) {
                    $servers_list[$value['Server']['id']] = $value['Server']['name'];
                }
                $search_item[0]['Item']['servers'] = unserialize($search_item[0]['Item']['servers']);
                $servers = '';
                $i = 0;
                foreach ($search_item[0]['Item']['servers'] as $serverId) {
                    $i++;
                    if (isset($servers_list) && !isset($servers_list[$serverId]))
                        continue;
                    $servers = $servers . $servers_list[$serverId];
                    if ($i < count($search_item[0]['Item']['servers'])) {
                        $servers = $servers . ', ';
                    }
                }
            }

            $item_price = $search_item['0']['Item']['price'];

            $affich_server = (!empty($search_item[0]['Item']['servers']) && $search_item[0]['Item']['display_server']) ? true : false;
            $multiple_buy = (!empty($search_item[0]['Item']['multiple_buy']) && $search_item[0]['Item']['multiple_buy']) ? true : false;
            $reductional_items_func = (!empty($search_item[0]['Item']['reductional_items']) && !is_bool(unserialize($search_item[0]['Item']['reductional_items']))) ? true : false;
            $reductional_items = false;
            if ($reductional_items_func) {

                $this->loadModel('Shop.ItemsBuyHistory');

                $reductional_items_list = unserialize($search_item[0]['Item']['reductional_items']);
                $reductional_items_list_display = array();
                // on parcours tous les articles pour voir si ils ont été achetés
                $reductional_items = true; // de base on dis que c'est okay
                $reduction = 0; // 0 de réduction
                foreach ($reductional_items_list as $key => $value) {

                    $findItem = $this->Item->find('first', array('conditions' => array('id' => $value)));
                    if (empty($findItem)) {
                        $reductional_items = false;
                        break;
                    }

                    $findHistory = $this->ItemsBuyHistory->find('first', array('conditions' => array('user_id' => $this->User->getKey('id'), 'item_id' => $findItem['Item']['id'])));
                    if (empty($findHistory)) {
                        $reductional_items = false;
                        break;
                    }

                    $reduction = +$findItem['Item']['price'];
                    $reductional_items_list_display[] = $findItem['Item']['name'];

                    unset($findItem);

                }

                if ($reductional_items) {
                    $item_price = $item_price - $reduction;

                    $reduction = $reduction . ' ' . $this->Configuration->getMoneyName();
                    $reductional_items_list = '<i>' . implode('</i>, <i>', $reductional_items_list_display) . '</i>';
                    $reductional_items_list = $this->Lang->get('SHOP__ITEM_REDUCTIONAL_ITEMS_LIST', array('{ITEMS_LIST}' => $reductional_items_list, '{REDUCTION}' => $reduction));

                }
            }

            $add_to_cart = (!empty($search_item[0]['Item']['cart']) && $search_item[0]['Item']['cart']) ? true : false;

            //On récupére l'element
            $filename_theme = APP . DS . 'View' . DS . 'Themed' . DS . $this->Configuration->getKey('theme') . DS . 'Plugin' . DS . 'Shop' . DS . 'Elements' . DS . 'modal_buy.ctp';
            if (file_exists($filename_theme)) {
                $element_content = file_get_contents($filename_theme);
            } else {
                $element_content = file_get_contents($this->EyPlugin->pluginsFolder . DS . 'Shop' . DS . 'View' . DS . 'Elements' . DS . 'modal_buy.ctp');
            }

            // On remplace les messages de langues

            $i = 0;
            $count = substr_count($element_content, '{LANG-');
            while ($i < $count) {
                $i++;

                $element_explode_for_lang = explode('{LANG-', $element_content);
                $element_explode_for_lang = explode('}', $element_explode_for_lang[1])[0];

                $element_content = str_replace('{LANG-' . $element_explode_for_lang . '}', $this->Lang->get($element_explode_for_lang), $element_content);

            }

            // On remplace les variables
            $servers = (!isset($servers)) ? null : $servers;

            $vars = array(
                '{ITEM_NAME}' => $search_item['0']['Item']['name'],
                '{ITEM_DESCRIPTION}' => nl2br($search_item['0']['Item']['description']),
                '{ITEM_SERVERS}' => $servers,
                '{ITEM_PRICE}' => $item_price,
                '{SITE_MONEY}' => $money,
                '{ITEM_ID}' => $search_item['0']['Item']['id'],
                '{ITEM_IMG_URL}' => $search_item['0']['Item']['img_url']
            );
            $element_content = strtr($element_content, $vars);

            // La condition d'affichage de serveur
            $element_explode_for_server = explode('[IF AFFICH_SERVER]', $element_content);
            $element_explode_for_server = explode('[/IF AFFICH_SERVER]', $element_explode_for_server[1])[0];

            $search_server = '[IF AFFICH_SERVER]' . $element_explode_for_server . '[/IF AFFICH_SERVER]';
            $element_content = ($affich_server) ? str_replace($search_server, $element_explode_for_server, $element_content) : str_replace($search_server, '', $element_content);

            // La condition d'affichage de l'input achat multiple
            $element_explode_for_multiple_buy = explode('[IF MULTIPLE_BUY]', $element_content);
            $element_explode_for_multiple_buy = explode('[/IF MULTIPLE_BUY]', $element_explode_for_multiple_buy[1])[0];

            $search_multiple_buy = '[IF MULTIPLE_BUY]' . $element_explode_for_multiple_buy . '[/IF MULTIPLE_BUY]';
            $element_content = ($multiple_buy) ? str_replace($search_multiple_buy, $element_explode_for_multiple_buy, $element_content) : str_replace($search_multiple_buy, '', $element_content);

            // La condition d'affichage de l'ajout au pnier
            $element_explode_for_add_to_cart = explode('[IF ADD_TO_CART]', $element_content);
            $element_explode_for_add_to_cart = explode('[/IF ADD_TO_CART]', $element_explode_for_add_to_cart[1])[0];

            $search_add_to_cart = '[IF ADD_TO_CART]' . $element_explode_for_add_to_cart . '[/IF ADD_TO_CART]';
            $element_content = ($add_to_cart) ? str_replace($search_add_to_cart, $element_explode_for_add_to_cart, $element_content) : str_replace($search_add_to_cart, '', $element_content);

            // La condition d'affichage du message de réduction de prix si articles achetés
            $element_explode_for_reductional_items = explode('[IF REDUCTIONAL_ITEMS]', $element_content);
            $element_explode_for_reductional_items = explode('[/IF REDUCTIONAL_ITEMS]', $element_explode_for_reductional_items[1])[0];

            $search_reductional_items = '[IF REDUCTIONAL_ITEMS]' . $element_explode_for_reductional_items . '[/IF REDUCTIONAL_ITEMS]';
            $element_content = ($reductional_items) ? str_replace($search_reductional_items, $element_explode_for_reductional_items, $element_content) : str_replace($search_reductional_items, '', $element_content);
            if ($reductional_items) {
                $element_content = str_replace('{REDUCTIONAL_ITEMS_LIST}', $reductional_items_list, $element_content);
            }


            $this->response->body(json_encode(array('statut' => true, 'html' => $element_content, 'item_infos' => array('id' => $search_item['0']['Item']['id'], 'name' => $search_item['0']['Item']['name'], 'price' => $item_price))));

        } else {
            $this->response->body(json_encode(array('statut' => false, 'html' => '<div class="alert alert-danger">' . $this->Lang->get('USER__ERROR_MUST_BE_LOGGED') . '</div>'))); // si il n'est pas connecté
        }
    }


    /*
    * ======== Achat d'un article depuis le modal ===========
    */

    public function checkVoucher($code = null, $items_id = null, $quantities = 1)
    {
        $this->autoRender = false;
        $this->response->type('json');

        if (!empty($code) && !empty($items_id)) {

            $this->loadModel('Shop.Item');

            $items_id = explode(',', $items_id);
            $quantities = explode(',', $quantities);
            $items = array_combine($items_id, $quantities);
            $total_price = 0;
            $new_price = 0;

            foreach ($items as $item_id => $quantity) {

                $findItem = $this->Item->find('first', array('conditions' => array('id' => $item_id)));

                if (!empty($findItem)) {

                    // On gère la quantité
                    $total_price += $findItem['Item']['price'] * $quantity;

                    $i = 0;
                    while ($i < $quantity) {

                        $getVoucherPrice = $this->DiscountVoucher->getNewPrice($findItem['Item']['id'], $code);

                        if ($getVoucherPrice['status']) {
                            $new_price = $new_price + $getVoucherPrice['price'];
                        } else {
                            $new_price = $new_price + $findItem['Item']['price']; // erreur
                        }

                        $i++;
                    }


                    /*
                        On gère les réductions de prix
                    */
                    $reduction = $this->Item->getReductionWithReductionalItems($findItem['Item'], $this->User->getKey('id'));
                    // on effectue la reduction
                    $new_price = $new_price - $reduction * $quantity;

                    if ($new_price < 0) {
                        $new_price = 0;
                    }

                }
            }

            $this->response->body(json_encode(array('price' => $new_price)));

        }

        return;

    }


    /*
    * ======== Achat d'un article depuis le modal ===========
    */

    function buy_ajax()
    {
        if (!$this->request->is('ajax'))
            throw new BadRequestException();
        if (!$this->Permissions->can('CAN_BUY'))
            return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('USER__ERROR_MUST_BE_LOGGED')]);
        if (empty($this->request->data['items']))
            return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SHOP__BUY_ERROR_EMPTY')]);

        // Remove duplicata
        $itemsList = [];
        foreach ($this->request->data['items'] as $item) {
            $item['quantity'] = intval((isset($item['quantity']) ? $item['quantity'] : 0));
            if (isset($items[$item['item_id']]))
                $itemsList[$item['item_id']]['quantity'] += $item['quantity'];
            else
                $itemsList[$item['item_id']] = $item;
        }

        // Models
        $this->loadModel('Shop.ItemsConfig');
        $this->loadModel('Shop.Item');
        $this->loadModel('Shop.ItemsBuyHistory');
        $this->loadModel('Shop.VouchersHistory');

        // Vars
        $totalPrice = 0;
        $giveSkin = 0;
        $giveCape = 0;
        $voucher = (isset($this->request->data['code']) && !empty($this->request->data['code'])) ? $this->request->data['code'] : NULL;
        $voucherUsedCount = 0;
        $voucherReduction = 0;
        $histories = [];

        $config = $this->ItemsConfig->find('first');
        if (empty($config))
            $config = ['broadcast_global' => ''];
        else
            $config = $config['ItemsConfig'];

        // Handle items
        $items = [];
        foreach ($itemsList as $itemData) {
            // Find item on database
            $item = $this->Item->find('first', ['conditions' => ['id' => $itemData['item_id']]]);
            if (empty($item))
                continue;
            $item = $item['Item'];

            // Check if can buy multiple
            if ($itemData['quantity'] > 1 && !$item['multiple_buy'])
                return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SHOP__ITEM_CANT_BUY_MULTIPLE', ['{ITEM_NAME}' => $item['name']])]);
            // Check if can buy in cart
            if (count($items) > 1 && !$item['cart'])
                return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SHOP__ITEM_CANT_ADDED_TO_CART', ['{ITEM_NAME}' => $item['name']])]);
            // Check buy limit
            if ($item['buy_limit'] > 0) {
                $countPurchases = $this->ItemsBuyHistory->find('count', ['conditions' => ['item_id' => $item['id'], 'user_id' => $this->User->getKey('id')]]);
                if ($countPurchases >= $item['buy_limit'])
                    return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SHOP__ITEM_CANT_BUY_LIMIT', ['{ITEM_NAME}' => $item['name'], '{LIMIT}' => $item['buy_limit']])]);
            }
            // Check wait time
            if ($item['wait_time']) {
                $lastPurchase = $this->ItemsBuyHistory->find('first', ['fields' => 'created', 'order' => 'id DESC', 'conditions' => ['item_id' => $item['id'], 'user_id' => $this->User->getKey('id')]]);
                if (!empty($lastPurchase) && strtotime('+' . $item['wait_time'], strtotime($lastPurchase['ItemsBuyHistory']['created'])) > time()) {
                    list($time, $unity) = explode(' ', $item['wait_time']);
                    return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SHOP__ITEM_CANT_BUY_WAIT_TIME', ['{ITEM_NAME}' => $item['name'], '{LIMIT}' => $item['buy_limit'], '{WAIT_TIME}' => $time . ' ' . $this->Lang->get('GLOBAL__DATE_R_' . strtoupper($unity))])]);
                }
            }
            // Check prerequisites
            $prerequisites = $this->Item->checkPrerequisites($item, $this->User->getKey('id'));
            if ($prerequisites !== TRUE) {
                return $this->sendJSON([
                    'statut' => false,
                    'msg' => $this->Lang->get('SHOP__ITEM_CANT_BUY_PREREQUISITES_' . $prerequisites['error'], array('{ITEMS}' => $prerequisites['items_list']))
                ]);
            }
            // Check if server online and user online if needed
            if (is_array(($item['servers'] = unserialize($item['servers'])))) {
                foreach ($item['servers'] as $serverId)
                    if (!$this->Server->online($serverId))
                        return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SERVER__MUST_BE_ON')]);
                if ($item['need_connect']) {
                    foreach ($item['servers'] as $serverId)
                        if (!$this->Server->userIsConnected($this->User->getKey('pseudo'), $serverId))
                            return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SHOP__ITEM_CANT_BUY_NOT_CONNECTED', ['{ITEM_NAME}' => $item['name']])]);
                }
            }

            // Add skin or cape give
            if ($item['give_skin'])
                $giveSkin = true;
            if ($item['give_cape'])
                $giveCape = true;

            // Voucher
            if (!empty($voucher)) {
                $getVoucherPrice = $this->DiscountVoucher->getNewPrice($item['id'], $voucher);

                if ($getVoucherPrice['status']) {
                    $voucherUsedCount++;
                    $voucherReduction += $item['price'] - $getVoucherPrice['price'];
                    $item['price'] = $getVoucherPrice['price'];
                }
            }

            // Reductionnal price
            $reduction = $this->Item->getReductionWithReductionalItems($item, $this->User->getKey('id'));
            $item['price'] -= $reduction;

            // Add to items (for quantity)
            for ($i = 1; $i <= $itemData['quantity']; $i++) {
                if ($i == $itemData['quantity'] && $item['broadcast_global']) { // Broadcast global only on last (avoid multiple global message)
                    $item['commands'] = "{$item['commands']}[{+}]" . strtr($config['broadcast_global'], [
                        '{PLAYER}' => $this->User->getKey('pseudo'),
                        '{QUANTITY}' => $itemData['quantity'],
                        '{ITEM_NAME}' => $item['name'],
                        '{SERVERNAME}' => implode(', ', array_map(function ($server) {
                            return $server['Server']['name'];
                        }, ClassRegistry::init('Server')->find('all', ['conditions' => ['id' => $item['servers']]])))
                    ]);
                }
                $items[] = $item;
                // Add to total price
                $totalPrice += floatval($item['price']);
            }

            // Histories
            $histories[] = array(
                'user_id' => $this->User->getKey('id'),
                'item_id' => $item['id']
            );
        }

        // Check if not empty
        if (empty($items))
            $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SHOP__BUY_ERROR_EMPTY')]);

        // Check price
        if ($totalPrice < 0)
            $totalPrice = 0;
        if (($userMoney = floatval($this->User->getKey('money'))) < $totalPrice)
            return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SHOP__BUY_ERROR_NO_ENOUGH_MONEY')]);

        // Event
        $event = new CakeEvent('onBuy', $this, array('items' => $items, 'total_price' => $totalPrice, 'user' => $this->User->getAllFromCurrentUser()));
        $this->getEventManager()->dispatch($event);
        if ($event->isStopped()) {
            return $event->result;
        }

        // Voucher set as used
        if ($voucherUsedCount > 0) {
            $this->DiscountVoucher->set_used($this->User->getKey('id'), $voucher, $voucherUsedCount);

            $this->VouchersHistory->create();
            $this->VouchersHistory->set(array(
                'code' => $voucher,
                'user_id' => $this->User->getKey('id'),
                'reduction' => $voucherReduction
            ));
            $this->VouchersHistory->save();
        }

        // Remove money
        $this->User->id = $this->User->getKey('id');
        $this->User->saveField('money', str_replace(',', '.', strval(round($userMoney - $totalPrice, 2))));

        // Add to history
        $this->ItemsBuyHistory->saveMany($histories);

        // Skin/Cape
        if ($giveSkin)
            $this->User->setKey('skin', 1);
        if ($giveCape)
            $this->User->setKey('cape', 1);

        // Commands
        foreach ($items as $item) {
            foreach ($item['servers'] as $serverId)
                $this->Server->commands($item['commands'], $serverId);
            if ($item['timedCommand'])
                $this->Server->scheduleCommands($item['timedCommand_cmd'], $item['timedCommand_time'], $item['servers']);
        }

        // Success msg
        return $this->sendJSON(['statut' => true, 'msg' => $this->Lang->get('SHOP__BUY_SUCCESS')]);
    }

    /*
    * ======== Page principale du panel admin ===========
    */
    public function admin_index()
    {
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_ITEMS')) {

            $this->set('title_for_layout', $this->Lang->get('SHOP__TITLE'));
            $this->layout = 'admin';

            $this->loadModel('Shop.Item');
            $search_items = $this->Item->find('all', array('order' => 'order'));
            $items = array();
            foreach ($search_items as $key => $value) {
                $items[$value['Item']['id']] = $value['Item']['name'];
            }

            $this->loadModel('Shop.Category');
            $search_categories = $this->Category->find('all');
            foreach ($search_categories as $v) {
                $categories[$v['Category']['id']]['name'] = $v['Category']['name'];
            }

            $this->loadModel('Shop.ItemsConfig');
            $findConfig = $this->ItemsConfig->find('first');
            $config = (!empty($findConfig)) ? $findConfig['ItemsConfig'] : array();

            $this->set(compact('categories', 'search_categories', 'search_items', 'config', 'items'));

        } else {
            $this->redirect('/');
        }
    }

    public function admin_get_histories_buy()
    {
        if ($this->isConnected && $this->Permissions->can('SHOP__ADMIN_MANAGE_ITEMS')) {

            $this->loadModel('Shop.Item');

            $this->autoRender = false;
            $this->response->type('json');

            $this->DataTable = $this->Components->load('DataTable');
            $this->modelClass = 'ItemsBuyHistory';
            $this->DataTable->initialize($this);
            $this->paginate = array(
                'fields' => array('ItemsBuyHistory.created', 'Item.name', 'User.pseudo'),
                'order' => 'ItemsBuyHistory.id DESC',
                'recursive' => 1
            );
            $this->DataTable->mDataProp = true;

            $response = $this->DataTable->getResponse();

            $this->response->body(json_encode($response));

        } else {
            throw new ForbiddenException();
        }
    }


    /*
    * ======== Page principale du panel admin ===========
    */
	public function admin_save_ajax()
    {
        $this->autoRender = false;
        if ($this->isConnected AND $this->Permissions->can('MANAGE_NAV')) {

            if ($this->request->is('post')) {
                if (!empty($this->request->data)) {
                    $data = $this->request->data['shop_item_order'];
                    $data = explode('&', $data);
                    $i = 1;
                    foreach ($data as $key => $value) {
                        $data2[] = explode('=', $value);
                        $data3 = substr($data2[0][0], 0, -2);
                        $data1[$data3] = $i;
                        unset($data3);
                        unset($data2);
                        $i++;
                    }
                    $data = $data1;
                    $this->loadModel('Shop.Item');
                    foreach ($data as $key => $value) {
                        $find = $this->Item->find('first', array('conditions' => array('name' => $key)));
                        if (!empty($find)) {
                            $id = $find['Item']['id'];
                            $this->Item->read(null, $id);
                            $this->Item->set(array(
                                'order' => $value,
                            ));
                            $this->Item->save();
                        } else {
                            $error = 1;
                        }
                    }
                    if (empty($error)) {
						return $this->sendJSON(['statut' => true, 'msg' => $this->Lang->get('SHOP__SAVE_SUCCESS')]);
					} else{
                        return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS')]);
                    }
                } else {
					return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS')]);
                }
            } else {
				return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST')]);

            }
        } else {
            $this->redirect('/');
        }
    }
    public function admin_config_items()
    {
        $this->autoRender = false;
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_ITEMS')) {

            if ($this->request->is('ajax')) {

                $this->loadModel('Shop.ItemsConfig');

                $ItemsConfig = $this->ItemsConfig->find('first');
                if (empty($ItemsConfig)) {
                    $this->ItemsConfig->create();
                } else {
                    $this->ItemsConfig->read(null, 1);
                }
                $this->ItemsConfig->set(array(
                        'goal' => $this->request->data['goal'],
			'broadcast_global' => $this->request->data['broadcast_global']
                    ));
                $this->ItemsConfig->save();

                $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('SHOP__CONFIG_SAVE_SUCCESS'))));

            } else {
                throw new ForbiddenException();
            }

        } else {
            throw new ForbiddenException();
        }
    }


    /*
    * ======== Modification d'un article (affichage de la page) ===========
    */

    public function admin_edit($id = false)
    {
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_ITEMS')) {
            if ($id != false) {

                $this->set('title_for_layout', $this->Lang->get('SHOP__ITEM_EDIT'));
                $this->layout = 'admin';
                $this->loadModel('Shop.Item');
                $item = $this->Item->find('all', array('conditions' => array('id' => $id)));
                if (!empty($item)) {
                    $item = $item[0]['Item'];
                    $this->loadModel('Shop.Category');
                    $item['category'] = $this->Category->find('all', array('conditions' => array('id' => $item['category'])));
                    $item['category'] = $item['category'][0]['Category']['name'];

                    $search_categories = $this->Category->find('all', array('fields' => 'name'));
                    $categories = array();
                    foreach ($search_categories as $v) {
                        if ($v['Category']['name'] != $item['category']) {
                            $categories[$v['Category']['name']] = $v['Category']['name'];
                        }
                    }
                    $this->set(compact('categories'));

                    $search_items = $this->Item->find('all', array('fields' => array('name', 'id')));
                    $items_available = array();
                    foreach ($search_items as $v) {
                        $items_available[$v['Item']['id']] = $v['Item']['name'];
                    }
                    $this->set(compact('items_available'));

                    $this->loadModel('Server');

                    $servers = $this->Server->findSelectableServers(true);
                    $this->set(compact('servers'));

                    $selected_server = array();
                    if (!empty($item['servers'])) {
                        $item['servers'] = unserialize($item['servers']);
                        foreach ($item['servers'] as $key => $value)
                            if (isset($servers[$value]))
                                $selected_server[] = $value;
                    }
                    $this->set(compact('selected_server'));

                    $commands = $item['commands'];
                    $commands = explode('[{+}]', $commands);
                    unset($item['commands']);
                    $item['commands'] = $commands;

                    $item['prerequisites'] = unserialize($item['prerequisites']);
                    if (is_bool($item['prerequisites'])) {
                        $item['prerequisites'] = array();
                    }
                    $item['reductional_items'] = unserialize($item['reductional_items']);
                    if (is_bool($item['reductional_items'])) {
                        $item['reductional_items'] = array();
                    }

                    if (isset($item['wait_time']) && !empty($item['wait_time'])) {
                        $wait_time = explode(' ', $item['wait_time']);
                        if (is_array($wait_time) && count($wait_time) == 2) {
                            $item['wait_time'] = array();
                            $item['wait_time']['time'] = $wait_time[0];
                            $item['wait_time']['type'] = $wait_time[1];
                        }
                    }

                    $this->set(compact('item'));

                } else {
                    $this->Session->setFlash($this->Lang->get('UNKNONW_ID'), 'default.error');
                    $this->redirect(array('controller' => 'news', 'action' => 'index', 'admin' => true));
                }
            } else {
                $this->redirect(array('controller' => 'news', 'action' => 'index', 'admin' => true));
            }
        } else {
            $this->redirect('/');
        }
    }


    /*
    * ======== Modification de l'article (traitement AJAX) ===========
    */

    public function admin_edit_ajax()
    {
        $this->autoRender = false;
        $this->response->type('json');
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_ITEMS')) {
            if ($this->request->is('post')) {
                if (empty($this->request->data['category'])) {
                    $this->request->data['category'] = $this->request->data['category_default'];
                }
                if (!empty($this->request->data['id']) AND !empty($this->request->data['name']) AND !empty($this->request->data['description']) AND !empty($this->request->data['category']) AND strlen($this->request->data['price']) > 0 AND !empty($this->request->data['servers']) AND !empty($this->request->data['commands']) AND !empty($this->request->data['timedCommand'])) {
                    $this->loadModel('Shop.Category');
                    $this->request->data['category'] = $this->Category->find('all', array('conditions' => array('name' => $this->request->data['category'])));
                    $this->request->data['category'] = $this->request->data['category'][0]['Category']['id'];
                    $this->request->data['timedCommand'] = ($this->request->data['timedCommand'] == 'true') ? 1 : 0;
                    if (!$this->request->data['timedCommand']) {
                        $this->request->data['timedCommand_cmd'] = NULL;
                        $this->request->data['timedCommand_time'] = NULL;
                    }

                    $commands = implode('[{+}]', $this->request->data['commands']);

                    $this->request->data['commands'] = $commands;
                    $event = new CakeEvent('beforeEditItem', $this, array('data' => $this->request->data, 'user' => $this->User->getAllFromCurrentUser()));
                    $this->getEventManager()->dispatch($event);
                    if ($event->isStopped()) {
                        return $event->result;
                    }

                    $prerequisites = (isset($this->request->data['prerequisites'])) ? serialize($this->request->data['prerequisites']) : NULL;
                    $reductional_items = (isset($this->request->data['reductional_items']) && $this->request->data['reductional_items_checkbox']) ? serialize($this->request->data['reductional_items']) : NULL;

                    $wait_time = implode(' ', $this->request->data['wait_time']);

                    $this->loadModel('Shop.Item');
                    $this->Item->read(null, $this->request->data['id']);
                    $this->Item->set(array(
                        'name' => $this->request->data['name'],
                        'description' => $this->request->data['description'],
                        'category' => $this->request->data['category'],
                        'price' => $this->request->data['price'],
                        'servers' => serialize($this->request->data['servers']),
                        'commands' => $commands,
                        'img_url' => $this->request->data['img_url'],
                        'timedCommand' => $this->request->data['timedCommand'],
                        'timedCommand_cmd' => $this->request->data['timedCommand_cmd'],
                        'timedCommand_time' => $this->request->data['timedCommand_time'],
                        'display_server' => $this->request->data['display_server'],
                        'need_connect' => $this->request->data['need_connect'],
                        'display' => $this->request->data['display'],
                        'multiple_buy' => $this->request->data['multiple_buy'],
                        'broadcast_global' => $this->request->data['broadcast_global'],
                        'cart' => $this->request->data['cart'],
                        'prerequisites_type' => $this->request->data['prerequisites_type'],
                        'prerequisites' => $prerequisites,
                        'reductional_items' => $reductional_items,
                        'give_skin' => $this->request->data['give_skin'],
                        'give_cape' => $this->request->data['give_cape'],
                        'buy_limit' => $this->request->data['buy_limit'],
                        'wait_time' => $wait_time
                    ));
                    $this->Item->save();
                    $this->Session->setFlash($this->Lang->get('SHOP__ITEM_EDIT_SUCCESS'), 'default.success');
                    $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('SHOP__ITEM_EDIT_SUCCESS'))));
                } else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
                }
            } else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }
        } else {
            throw new ForbiddenException();
        }
    }


    /*
    * ======== Ajout d'un article (affichage) ===========
    */

    public function admin_add_item()
    {
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_ITEMS')) {

            $this->set('title_for_layout', $this->Lang->get('SHOP__ITEM_ADD'));
            $this->layout = 'admin';
            $this->loadModel('Shop.Category');
            $search_categories = $this->Category->find('all', array('fields' => 'name'));
            $categories = array();
            foreach ($search_categories as $v) {
                $categories[$v['Category']['name']] = $v['Category']['name'];
            }
            $this->set(compact('categories'));

            $this->loadModel('Shop.Item');
            $search_items = $this->Item->find('all', array('fields' => array('name', 'id')));
            $items_available = array();
            foreach ($search_items as $v) {
                $items_available[$v['Item']['id']] = $v['Item']['name'];
            }
            $this->set(compact('items_available'));

            $this->loadModel('Server');
            $servers = $this->Server->findSelectableServers(true);
            $this->set(compact('servers'));

        } else {
            $this->redirect('/');
        }
    }
    public function admin_edit_category()
    {
        $this->autoRender = false;
        $this->response->type('json');
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_CATEGORIES')) {
            if ($this->request->is('post')) {
                if (!empty($this->request->data['name'])) {

                    $this->loadModel('Shop.Category');
                    $this->Category->read(null, $this->request->data['id']);
                    $this->Category->set(array(
                        'name' => $this->request->data['name'],
                    ));
                    $this->Category->save();
                    $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('SHOP__CATEGORY_EDIT_SUCCESS'))));
                } else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
                }
            } else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }
        } else {
            throw new ForbiddenException();
        }
    }

    /*
    * ======== Ajout d'un article (Traitement AJAX) ===========
    */

    public function admin_add_item_ajax()
    {
        $this->autoRender = false;
        $this->response->type('json');
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_ITEMS')) {
            if ($this->request->is('post')) {

                if (!empty($this->request->data['name']) AND !empty($this->request->data['description']) AND !empty($this->request->data['category']) AND strlen($this->request->data['price']) > 0 AND !empty($this->request->data['servers']) AND !empty($this->request->data['commands']) AND !empty($this->request->data['timedCommand'])) {
                    $this->loadModel('Shop.Category');
                    $this->request->data['category'] = $this->Category->find('all', array('conditions' => array('name' => $this->request->data['category'])));
                    $this->request->data['category'] = $this->request->data['category'][0]['Category']['id'];
                    $this->request->data['timedCommand'] = ($this->request->data['timedCommand'] == 'true') ? 1 : 0;
                    if (!$this->request->data['timedCommand']) {
                        $this->request->data['timedCommand_cmd'] = NULL;
                        $this->request->data['timedCommand_time'] = NULL;
                    }

                    $commands = implode('[{+}]', $this->request->data['commands']);

                    $this->request->data['commands'] = $commands;
                    $event = new CakeEvent('beforeAddItem', $this, array('data' => $this->request->data, 'user' => $this->User->getAllFromCurrentUser()));
                    $this->getEventManager()->dispatch($event);
                    if ($event->isStopped()) {
                        return $event->result;
                    }

                    $prerequisites = (isset($this->request->data['prerequisites'])) ? serialize($this->request->data['prerequisites']) : NULL;
                    $reductional_items = (isset($this->request->data['reductional_items']) && $this->request->data['reductional_items_checkbox']) ? serialize($this->request->data['reductional_items']) : NULL;

                    $wait_time = implode(' ', $this->request->data['wait_time']);

                    $this->loadModel('Shop.Item');
                    $this->Item->read(null, null);
                    $this->Item->set(array(
                        'name' => $this->request->data['name'],
                        'description' => $this->request->data['description'],
                        'category' => $this->request->data['category'],
                        'price' => $this->request->data['price'],
                        'servers' => serialize($this->request->data['servers']),
                        'commands' => $commands,
                        'img_url' => $this->request->data['img_url'],
                        'timedCommand' => $this->request->data['timedCommand'],
                        'timedCommand_cmd' => $this->request->data['timedCommand_cmd'],
                        'timedCommand_time' => $this->request->data['timedCommand_time'],
                        'display_server' => $this->request->data['display_server'],
                        'need_connect' => $this->request->data['need_connect'],
                        'display' => $this->request->data['display'],
                        'multiple_buy' => $this->request->data['multiple_buy'],
                        'broadcast_global' => $this->request->data['broadcast_global'],
                        'cart' => $this->request->data['cart'],
                        'prerequisites_type' => $this->request->data['prerequisites_type'],
                        'prerequisites' => $prerequisites,
                        'reductional_items' => $reductional_items,
                        'give_skin' => $this->request->data['give_skin'],
                        'give_cape' => $this->request->data['give_cape'],
                        'buy_limit' => $this->request->data['buy_limit'],
                        'wait_time' => $wait_time
                    ));
                    $this->Item->save();
                    $this->History->set('ADD_ITEM', 'shop');
                    $this->Session->setFlash($this->Lang->get('SHOP__ITEM_ADD_SUCCESS'), 'default.success');
                    $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('SHOP__ITEM_ADD_SUCCESS'))));
                } else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
                }
            } else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }
        } else {
            throw new ForbiddenException();
        }
    }


    /*
    * ======== Ajout d'une catégorie (affichage & traitement POST) ===========
    */

    public function admin_add_category()
    {
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_ITEMS')) {

            $this->layout = 'admin';
            $this->set('title_for_layout', $this->Lang->get('SHOP__CATEGORY_ADD'));
            if ($this->request->is('post')) {
                if (!empty($this->request->data['name'])) {
                    $this->loadModel('Shop.Category');

                    $event = new CakeEvent('beforeAddCategory', $this, array('category' => $this->request->data['name'], 'user' => $this->User->getAllFromCurrentUser()));
                    $this->getEventManager()->dispatch($event);
                    if ($event->isStopped()) {
                        return $event->result;
                    }

                    $this->Category->read(null, null);
                    $this->Category->set(array(
                        'name' => $this->request->data['name'],
                    ));
                    $this->History->set('ADD_CATEGORY', 'shop');
                    $this->Category->save();
                    $this->Session->setFlash($this->Lang->get('SHOP__CATEGORY_ADD_SUCCESS'), 'default.success');
                    $this->redirect(array('controller' => 'shop', 'action' => 'index', 'admin' => true));
                } else {
                    $this->Session->setFlash($this->Lang->get('ERROR__FILL_ALL_FIELDS'), 'default.error');
                }
            }
        } else {
            $this->redirect('/');
        }
    }

    /*
    * ======== Suppression d'une catégorie/article/paypal/starpass (traitement) ===========
    */

    public function admin_delete($type = false, $id = false)
    {
        $this->autoRender = false;
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_ITEMS')) {
            if ($type != false AND $id != false) {
                if ($type == "item") {
                    $this->loadModel('Shop.Item');
                    $find = $this->Item->find('all', array('conditions' => array('id' => $id)));
                    if (!empty($find)) {

                        $event = new CakeEvent('beforeDeleteItem', $this, array('item_id' => $id, 'user' => $this->User->getAllFromCurrentUser()));
                        $this->getEventManager()->dispatch($event);
                        if ($event->isStopped()) {
                            return $event->result;
                        }

                        $this->Item->delete($id);
                        $this->History->set('DELETE_ITEM', 'shop');
                        $this->Session->setFlash($this->Lang->get('SHOP__ITEM_DELETE_SUCCESS'), 'default.success');
                        $this->redirect(array('controller' => 'shop', 'action' => 'index', 'admin' => true));
                    } else {
                        $this->Session->setFlash($this->Lang->get('UNKNONW_ID'), 'default.error');
                        $this->redirect(array('controller' => 'shop', 'action' => 'index', 'admin' => true));
                    }
                } elseif ($type == "category") {
                    $this->loadModel('Shop.Category');
                    $find = $this->Category->find('all', array('conditions' => array('id' => $id)));
                    if (!empty($find)) {

                        $event = new CakeEvent('beforeDeleteCategory', $this, array('category_id' => $id, 'user' => $this->User->getAllFromCurrentUser()));
                        $this->getEventManager()->dispatch($event);
                        if ($event->isStopped()) {
                            return $event->result;
                        }

                        $this->Category->delete($id);
                        $this->History->set('DELETE_CATEGORY', 'shop');
                        $this->Session->setFlash($this->Lang->get('SHOP__CATEGORY_DELETE_SUCCESS'), 'default.success');
                        $this->redirect(array('controller' => 'shop', 'action' => 'index', 'admin' => true));
                    } else {
                        $this->Session->setFlash($this->Lang->get('UNKNONW_ID'), 'default.error');
                        $this->redirect(array('controller' => 'shop', 'action' => 'index', 'admin' => true));
                    }
                } elseif ($type == "paypal") {
                    $this->loadModel('Shop.Paypal');
                    $find = $this->Paypal->find('all', array('conditions' => array('id' => $id)));
                    if (!empty($find)) {

                        $event = new CakeEvent('beforeDeletePaypalOffer', $this, array('offer_id' => $id, 'user' => $this->User->getAllFromCurrentUser()));
                        $this->getEventManager()->dispatch($event);
                        if ($event->isStopped()) {
                            return $event->result;
                        }

                        $this->Paypal->delete($id);
                        $this->History->set('DELETE_PAYPAL_OFFER', 'shop');
                        $this->Session->setFlash($this->Lang->get('SHOP__PAYPAL_OFFER_DELETE_SUCCESS'), 'default.success');
                        $this->redirect(array('controller' => 'shop', 'action' => 'index', 'admin' => true));
                    } else {
                        $this->Session->setFlash($this->Lang->get('UNKNONW_ID'), 'default.error');
                        $this->redirect(array('controller' => 'shop', 'action' => 'index', 'admin' => true));
                    }
                } elseif ($type == "starpass") {
                    $this->loadModel('Shop.Starpass');
                    $find = $this->Starpass->find('all', array('conditions' => array('id' => $id)));
                    if (!empty($find)) {

                        $event = new CakeEvent('beforeDeleteStarpassOffer', $this, array('offer_id' => $id, 'user' => $this->User->getAllFromCurrentUser()));
                        $this->getEventManager()->dispatch($event);
                        if ($event->isStopped()) {
                            return $event->result;
                        }

                        $this->Starpass->delete($id);
                        $this->History->set('DELETE_STARPASS_OFFER', 'shop');
                        $this->Session->setFlash($this->Lang->get('SHOP__STARPASS_OFFER_DELETE_SUCCESS'), 'default.success');
                        $this->redirect(array('controller' => 'shop', 'action' => 'index', 'admin' => true));
                    } else {
                        $this->Session->setFlash($this->Lang->get('UNKNONW_ID'), 'default.error');
                        $this->redirect(array('controller' => 'shop', 'action' => 'index', 'admin' => true));
                    }
                }
            } else {
                $this->redirect(array('controller' => 'shop', 'action' => 'index', 'admin' => true));
            }
        } else {
            $this->redirect('/');
        }
    }


    /*
    * ======== Page principale pour les promos ===========
    */


    public function admin_vouchers()
    {
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_VOUCHERS')) {

            $this->set('title_for_layout', $this->Lang->get('SHOP__VOUCHERS_MANAGE'));
            $this->layout = 'admin';

            $this->loadModel('Shop.Voucher');
            $vouchers = $this->Voucher->find('all');

            $this->loadModel('Shop.VouchersHistory');
            $vouchers_histories = $this->VouchersHistory->find('all', array('order' => 'id DESC'));

            $usersToFind = array();
            foreach ($vouchers_histories as $key => $value) {
                $usersToFind[] = $value['VouchersHistory']['user_id'];
            }

            $usersByID = array();

            $findUsers = $this->User->find('all', array('conditions' => array('id' => $usersToFind)));
            foreach ($findUsers as $key => $value) {
                $usersByID[$value['User']['id']] = $value['User']['pseudo'];
            }

            $itemsByID = array();

            $this->loadModel('Shop.Item');
            $findItems = $this->Item->find('all');
            foreach ($findItems as $key => $value) {
                $itemsByID[$value['Item']['id']] = $value['Item']['name'];
            }

            $this->set(compact('vouchers', 'vouchers_histories', 'usersByID', 'itemsByID'));

        } else {
            throw new ForbiddenException();
        }
    }


    /*
    * ======== Ajout d'un code promotionnel (affichage) ===========
    */

    public function admin_add_voucher()
    {
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_VOUCHERS')) {

            $this->set('title_for_layout', $this->Lang->get('SHOP__VOUCHER_ADD'));
            $this->layout = 'admin';

            $this->loadModel('Shop.Category');
            $search_categories = $this->Category->find('all', array('fields' => array('name', 'id')));
            foreach ($search_categories as $v) {
                $categories[$v['Category']['id']] = $v['Category']['name'];
            }
            $this->set(compact('categories'));
            $this->loadModel('Shop.Item');
            $search_items = $this->Item->find('all', array('fields' => array('name', 'id')));
            foreach ($search_items as $v) {
                $items[$v['Item']['id']] = $v['Item']['name'];
            }
            $this->set(compact('items'));

        } else {
            $this->redirect('/');
        }
    }


    /*
    * ======== Ajout d'un code promotionnel (traitement AJAX) ===========
    */

    public function admin_add_voucher_ajax()
    {
        $this->autoRender = false;
        $this->response->type('json');
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_VOUCHERS')) {
            if ($this->request->is('post')) {
                if (!empty($this->request->data['code']) AND !empty($this->request->data['effective_on']) AND !empty($this->request->data['type']) AND !empty($this->request->data['reduction']) AND !empty($this->request->data['end_date'])) {
                    if (preg_match('/^[a-zA-Z0-9#]{0,20}$/', $this->request->data['code'])) {

                        if ($this->request->data['effective_on'] == "categories") {
                            $effective_on_value = array('type' => 'categories', 'value' => $this->request->data['effective_on_categorie']);
                        }
                        if ($this->request->data['effective_on'] == "items") {
                            $effective_on_value = array('type' => 'items', 'value' => $this->request->data['effective_on_item']);
                        }
                        if ($this->request->data['effective_on'] == "all") {
                            $effective_on_value = array('type' => 'all');
                        }

                        $this->request->data['effective_on'] = $effective_on_value;
                        $event = new CakeEvent('beforeAddVoucher', $this, array('data' => $this->request->data, 'user' => $this->User->getAllFromCurrentUser()));
                        $this->getEventManager()->dispatch($event);
                        if ($event->isStopped()) {
                            return $event->result;
                        }

                        if ($this->request->data['affich']) {
                            $this->loadModel('Notification');
                            $this->Notification->setToAll($this->Lang->get('NOTIFICATION__NEW_VOUCHER'));
                        }

                        $this->loadModel('Shop.Voucher');
                        $this->Voucher->read(null, null);
                        $this->Voucher->set(array(
                            'code' => $this->request->data['code'],
                            'effective_on' => serialize($effective_on_value),
                            'type' => intval($this->request->data['type']),
                            'reduction' => $this->request->data['reduction'],
                            'limit' => $this->request->data['limit'],
                            'limit_type' => $this->request->data['limit_type'],
                            'start_date' => $this->request->data['start_date'],
                            'end_date' => $this->request->data['end_date'],
                            'affich' => $this->request->data['affich'],
                        ));
                        $this->Voucher->save();
                        $this->History->set('ADD_VOUCHER', 'shop');
                        $this->Session->setFlash($this->Lang->get('SHOP__VOUCHER_ADD_SUCCESS'), 'default.success');
                        $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('SHOP__VOUCHER_ADD_SUCCESS'))));

                    } else {
                        $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('SHOP__VOUCHER_ADD_ERROR_CODE_INVALID'))));
                    }
                } else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
                }
            } else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }
        } else {
            throw new ForbiddenException();
        }
    }


    /*
    * ======== Suppression d'un code promotionnel (traitement POST) ===========
    */

    public function admin_delete_voucher($id = false)
    {
        $this->autoRender = false;
        if ($this->isConnected AND $this->Permissions->can('SHOP__ADMIN_MANAGE_VOUCHERS')) {
            if ($id != false) {

                $event = new CakeEvent('beforeDeleteVoucher', $this, array('voucher_id' => $id, 'user' => $this->User->getAllFromCurrentUser()));
                $this->getEventManager()->dispatch($event);
                if ($event->isStopped()) {
                    return $event->result;
                }

                $this->loadModel('Shop.Voucher');
                $this->Voucher->delete($id);
                $this->History->set('DELETE_VOUCHER', 'shop');
                $this->Session->setFlash($this->Lang->get('SHOP__VOUCHER_DELETE_SUCCESS'), 'default.success');
                $this->redirect(array('controller' => 'shop', 'action' => 'vouchers', 'admin' => true));
            } else {
                $this->redirect(array('controller' => 'shop', 'action' => 'vouchers', 'admin' => true));
            }
        } else {
            $this->redirect('/');
        }
    }

}
