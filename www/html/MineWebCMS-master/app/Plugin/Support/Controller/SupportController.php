<?php

class SupportController extends AppController
{

    public function getUser($tag, $id)
    {
        $this->loadModel('User');
        return $this->User->getFromUser($tag, $id);
    }

    function getCategorie($id)
    {
        $this->loadModel('Support.CategoriesSupport');
        $categorie = $this->CategoriesSupport->find('first', array('conditions' => array('CategoriesSupport.id' => array($id))));
        if(!empty($categorie)){
            $categorieName = $categorie['CategoriesSupport']['name'];
        }else{
            $categorieName = "Inconnus";
        }
        return $categorieName;
    }

    public function noConnectError()
    {
        $this->set('messageTitle', 'Une erreur est survenue !');
        $this->set('messageHTML', '<strong>Vous devez être connecté pour pouvoir accéder au Support !<strong>');
        $this->render('Errors/mineweb_custom_message');
    }

    public function index()
    {
        if (!$this->isConnected)
          $this->noConnectError();
        $this->set('title_for_layout', "Support");
        $this->loadModel('Support.Ticket');
        $tickets = $this->Ticket->find('all', array('conditions' => array('Ticket.author' => array($this->User->getKey('id')))));
        $this->set(compact('tickets'));
    }

    function admin_index()
    {
		$this->layout = 'admin';
        if (!$this->Permissions->can('MANAGE_TICKETS'))
            throw new ForbiddenException();
        $this->set('title_for_layout', $this->Lang->get('SUPPORT__GESTION_TICKETS') . ' - ' . $this->Lang->get('SUPPORT__SUPPORT'));
        $this->loadModel('Support.Ticket');
		if(isset($this->request->query['state'])){
			$stateActive = $this->request->query['state'];
		}else{
			$this->redirect('/admin/support?state=0');
        }
        if($stateActive > 3){
            $this->redirect('/admin/support?state=0');
        }
		$state_ticket = array(array("name" => "Répondu", "id" => "", "isActive" => false, "customClass" => "warning"), array("name" => "En attente", "id" => "", "customClass" => "info", "isActive" => false), array("name" => "Clôs", "id" => "", "customClass" => "danger", "isActive" => false), array("name" => "Réouvert", "id" => "", "customClass" => "success", "isActive" => false));
		$stateCurrentData = array();
		foreach($state_ticket as $k => $st):
			$ticketCountState = $this->Ticket->find('count', array('conditions' => array('Ticket.state' => array($k))));
			$state_ticket = array_replace($state_ticket, array($k => array("name" => $st['name'], "count" => $ticketCountState, "customClass" => $st['customClass'], "id" => $k, "isActive" => false)));
			if($k == $stateActive){
				$state_ticket = array_replace($state_ticket, array($k => array("name" => $st['name'], "count" => $ticketCountState, "id" => $k, "isActive" => true, "customClass" => $st['customClass'])));
				$stateCurrentData = array_replace($stateCurrentData, array("name" => $st['name'], "id" => $k, "isActive" => true, "customClass" => $st['customClass']));
			}
		endforeach;
		$tickets = $this->Ticket->find('all', array('conditions' => array('Ticket.state' => array($stateActive))));
		
		$this->loadModel('Plugins');
		$plugins = $this->Plugins->find('all');
		foreach($plugins as $pl)
			if($pl['Plugins']['apiID'] == 2 && $pl['Plugins']['version'] == "1.0.16")
				$isUpdateImportant = true;
        $this->set(compact('tickets', 'state_ticket', 'stateCurrentData', 'isUpdateImportant'));
    }
	
	function admin_config()
	{
		$this->layout = 'admin';
        if (!$this->Permissions->can('SETTINGS_SUPPORT'))
            throw new ForbiddenException();
        $this->set('title_for_layout', $this->Lang->get('SUPPORT__SETTINGS_TITLE') . ' - ' . $this->Lang->get('SUPPORT__SUPPORT'));
		$this->loadModel('Support.SettingsSupport');
		$settings = $this->SettingsSupport->find('first');
		$this->set(compact('settings'));
	}

    function admin_ajax_create_categorie()
    {
       if (!$this->Permissions->can('MANAGE_CATEGORIES'))
            throw new ForbiddenException();
      if (!$this->Permissions->can('ADD_CATEGORIE'))
            throw new ForbiddenException();
       if (!$this->request->is('post'))
            throw new BadRequestException();
       if (empty($this->request->data['name_categorie']))
            return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SUPPORT__CATEGOIRE_EMPTY_NAME')]);
       $this->loadModel('Support.CategoriesSupport');
       $nameCategorie = $this->request->data['name_categorie'];
       $categories = $this->CategoriesSupport->find('all', array('conditions' => array('CategoriesSupport.name' => array($nameCategorie))));
       if(!empty($categories))
            return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SUPPORT__CATEGORIE_ALREADY_EXIST', ['{NAME}' => $nameCategorie])]);
       $this->CategoriesSupport->set(array(
         'name' => $nameCategorie
       ));
       $this->CategoriesSupport->save();
       $this->sendJSON(['statut' => true, 'msg' => $this->Lang->get('SUPPORT__CATEGORIE_CREATE_SUCCESS', ['{NAME}' => $nameCategorie])]);
    }

    function admin_ajax_edit_categorie()
    {
      if (!$this->Permissions->can('MANAGE_CATEGORIES'))
           throw new ForbiddenException();
      if (!$this->Permissions->can('EDIT_CATEGORIE'))
           throw new ForbiddenException();
      if (!$this->request->is('post'))
           throw new BadRequestException();
      if (empty($this->request->data['name_categorie']))
           return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SUPPORT__CATEGOIRE_EMPTY_NAME')]);
      $id = $this->request->data['idCategorie'];
      $this->loadModel('Support.CategoriesSupport');
      $nameCategorie = $this->request->data['name_categorie'];
      $categories = $this->CategoriesSupport->find('all', array('conditions' => array('CategoriesSupport.name' => array($nameCategorie))));
      if(!empty($categories))
           return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SUPPORT__CATEGORIE_ALREADY_EXIST', ['{NAME}' => $nameCategorie])]);
      $this->CategoriesSupport->read(null, $id);
      $this->CategoriesSupport->set(array(
          'name' => $nameCategorie
      ));
      $this->CategoriesSupport->save();
      $this->sendJSON(['statut' => true, 'msg' => $this->Lang->get('SUPPORT__CATEGORIE_EDIT_SUCCESS', ['{NAME}' => $nameCategorie])]);
    }

    function admin_ajax_delete_categorie()
    {
      if (!$this->Permissions->can('MANAGE_CATEGORIES'))
           throw new ForbiddenException();
      if (!$this->Permissions->can('DELETE_CATEGORIE'))
           throw new ForbiddenException();
      if (!$this->request->is('post'))
           throw new BadRequestException();
      $id = $this->request->data['idCategorie'];
      $nameCategorie = $this->request->data['name_categorie'];
      $this->loadModel('Support.CategoriesSupport');
      $this->CategoriesSupport->delete($id);
      $this->sendJSON(['statut' => true, 'msg' => $this->Lang->get('SUPPORT__CATEGORIE_DELETE_SUCCESS', ['{NAME}' => $nameCategorie])]);
    }

    function admin_categories()
    {
        if (!$this->Permissions->can('MANAGE_CATEGORIES'))
            throw new ForbiddenException();
        $this->set('title_for_layout', $this->Lang->get('SUPPORT__GESTION_CATEGORIES') . ' - ' . $this->Lang->get('SUPPORT__SUPPORT'));
        $this->loadModel('Support.CategoriesSupport');
        $categories = $this->CategoriesSupport->find('all');
        if(empty($categories)){
            $data = array(
                array('name' => 'Site Web'),
                array('name' => 'Payment'),
                array('name' => 'InGame'),
            );
            $this->CategoriesSupport->saveMany($data);
            $this->redirect('/admin/support/categories');
        }
        $this->set(compact('categories'));
        $this->layout = 'admin';
    }

    function admin_ticket($id)
    {
        if (!$this->Permissions->can('MANAGE_TICKETS'))
            throw new ForbiddenException();
		$this->layout = 'admin';
        $this->loadModel('Support.Ticket');
        $this->loadModel('Support.ReplyTicket');
        $ticket = $this->Ticket->find('first', array('conditions' => array("Ticket.id" => array($id))));
        if (empty($ticket))
            throw new NotFoundException();
        $answers = $this->ReplyTicket->find('all', array('conditions' => array("ReplyTicket.ticket_id" => array($id))));

        $this->set(compact('ticket', 'answers'));
        $this->set('title_for_layout', $this->Lang->get('SUPPORT__TICKETNUMBER') . '' . $id);
    }

    function ticket($id)
    {
        if (!$this->isConnected)
            $this->noConnectError();
        $this->loadModel('Support.Ticket');
        $this->loadModel('Support.ReplyTicket');
        $ticket = $this->Ticket->find('first', ['conditions' => ['id' => $id, 'author' => $this->User->getKey('id')]]);
        if (empty($ticket))
            throw new NotFoundException();
        $answers = $this->ReplyTicket->find('all', array('conditions' => array("ReplyTicket.ticket_id" => array($id))));
        $this->set(compact('ticket', 'answers'));
        $this->set('title_for_layout', $this->Lang->get('SUPPORT__TICKETNUMBER') . '' . $id);
    }

    function create()
    {
        if (!$this->isConnected)
            $this->noConnectError();
        $this->loadModel('Support.CategoriesSupport');
        $categories = $this->CategoriesSupport->find('all');
        $this->set(compact('categories'));
        $this->set('title_for_layout', $this->Lang->get('SUPPORT__CREATETITLE'));
    }

    function ajax_create()
    {
        if (!$this->isConnected)
            throw new ForbiddenException();
        if (!$this->request->is('post'))
            throw new BadRequestException();

        if (empty($this->request->data['subject']) || empty($this->request->data['reponse_text']))
            return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS')]);
        $contentTicket = $this->request->data['reponse_text'];
        if (strlen($contentTicket) < 50)
            return $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SUPPORT__ERROR_PROBLEM_SHORT')]);

        $this->loadModel('Support.Ticket');
        $this->loadModel('Notification');
        $this->Ticket->set(array(
            'author' => $this->User->getKey('id'),
            'subject' => $this->request->data['subject'],
            'categorie' => $this->request->data['categorie'],
            'reponse_text' => $contentTicket
        ));
        $this->Ticket->save();

        $this->Notification->setToAdmin($this->User->getKey('pseudo') . ' ' . $this->Lang->get('SUPPORT__NOTIF_CREATE'));
        $this->sendJSON(['statut' => true, 'msg' => $this->Lang->get('SUPPORT__SUCCESS_CREATE')]);
    }

    function admin_delete_adm($idTicket)
    {
        if (!$this->Permissions->can('MANAGE_TICKETS'))
          throw new ForbiddenException();
        if (!$this->Permissions->can('DELETE_TICKETS'))
            throw new ForbiddenException();
        $this->loadModel('Support.Ticket');
        $this->loadModel('Support.ReplyTicket');
        $this->loadModel('Notification');
        $ticket = $this->Ticket->find('first', ['conditions' => ['id' => $idTicket]]);
        if (empty($ticket))
            throw new NotFoundException();
        $this->loadModel('Support.Ticket');
        $this->loadModel('Support.ReplyTicket');
        $this->loadModel('Notification');

        $this->Ticket->delete($ticket['Ticket']['id']);
        $this->ReplyTicket->deleteAll(array('ReplyTicket.ticket_id' => $ticket['Ticket']['id']), false);
        $this->Notification->setToUser('Votre ticket N° '.$ticket['Ticket']['id'].' a été supprimé !', $ticket['Ticket']['author']);
        $this->redirect('/admin/support?state=0');
		exit;
    }

    function admin_ajax_replya()
    {
        if (!$this->Permissions->can('MANAGE_TICKETS'))
            throw new ForbiddenException();
        if (!$this->Permissions->can('ANSWER_TICKETS'))
            throw new ForbiddenException();
        if (!$this->request->is('post'))
            throw new BadRequestException();
        $this->loadModel('Support.Ticket');
        $this->loadModel('Support.ReplyTicket');
        $this->loadModel('Notification');
        $ticket = $this->Ticket->find('first', ['conditions' => ['id' => $this->request->data['idTicket']]]);
        if (empty($ticket))
            throw new NotFoundException();
        $contentAnswer = $this->request->data['reponse_text'];
        if (empty($contentAnswer)){
            $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SUPPORT__ERROR_RESOLVE_EMPTY')]);
            return;
        }else{
            $this->Ticket->read(null, $ticket['Ticket']['id']);
            $this->Ticket->set(['state' => '1']);
            $this->Ticket->save();

            $this->ReplyTicket->set([
                'ticket_id' => $this->request->data['idTicket'],
                'reply' => $contentAnswer,
                'author' => $this->User->getKey('id'),
                'type' => 1
            ]);
            $this->ReplyTicket->save();

            $this->Notification->setToUser($this->User->getKey('pseudo') . ' ' . $this->Lang->get('SUPPORT__NOTIF_ANSWER') . ' ' . $ticket['Ticket']['id'] . ' !', $ticket['Ticket']['author']);
            $this->sendJSON(['statut' => true, 'msg' => $this->Lang->get('SUPPORT__SUCCESS_SEND_ANSWER')]);
        }
    }

    function ajax_reply()
    {
        if (!$this->isConnected)
            throw new ForbiddenException();
        if (!$this->request->is('post'))
            throw new BadRequestException();
        $this->loadModel('Support.Ticket');
        $this->loadModel('Support.ReplyTicket');
        $this->loadModel('Notification');
        $ticket = $this->Ticket->find('first', ['conditions' => ['id' => $this->request->data['idTicket'], 'author' => $this->User->getKey('id')]]);
        if (empty($ticket))
            throw new NotFoundException();
        $contentAnswer = $this->request->data['reponse_text'];
        if ($contentAnswer != null){
            $this->Ticket->read(null, $ticket['Ticket']['id']);
            $this->Ticket->set(['state' => 0]);
            $this->Ticket->save();

            $this->ReplyTicket->set([
                'ticket_id' => $this->request->data['idTicket'],
                'reply' => $contentAnswer,
                'author' => $this->User->getKey('id'),
                'type' => 0
            ]);
            $this->ReplyTicket->save();

            $this->Notification->setToAdmin($this->User->getKey('pseudo') . ' ' . $this->Lang->get('SUPPORT__NOTIF_ANSWER') . ' ' . $ticket['Ticket']['id'] . ' !');
            $this->sendJSON(['statut' => true, 'msg' => $this->Lang->get('SUPPORT__SUCCESS_SEND_ANSWER')]);
        }else{
          $this->sendJSON(['statut' => false, 'msg' => $this->Lang->get('SUPPORT__ERROR_RESOLVE_EMPTY')]);
          return;
        }

    }

    function ajax_clos()
    {
        if (!$this->isConnected)
            throw new ForbiddenException();
        if (!$this->request->is('post'))
            throw new BadRequestException();

        $this->loadModel('Support.Ticket');
        $this->loadModel('Notification');
        $ticket = $this->Ticket->find('first', ['conditions' => ['id' => $this->request->data['idTicket'], 'author' => $this->User->getKey('id')]]);
        if (empty($ticket))
            throw new NotFoundException();

        $this->Ticket->read(null, $ticket['Ticket']['id']);
        $this->Ticket->set(['state' => 2]);
        $this->Ticket->save();

        $this->Notification->setToAdmin($this->User->getKey('pseudo') . ' ' . $this->Lang->get('SUPPORT__NOTIF_CLOS') . ' ' . $ticket['Ticket']['id'] . ' !');
        $this->sendJSON(['statut' => true, 'msg' => $this->Lang->get('SUPPORT__SUCCESS_CLOSE')]);
    }

    function admin_closa_adm($idTicket)
    {
        if (!$this->Permissions->can('MANAGE_TICKETS'))
            throw new ForbiddenException();
        if (!$this->Permissions->can('CLOSE_TICKETS'))
            throw new ForbiddenException();
        $this->loadModel('Support.Ticket');
        $this->loadModel('Notification');
        $ticket = $this->Ticket->find('first', ['conditions' => ['id' => $idTicket]]);
        if (empty($ticket))
            throw new NotFoundException();
        $this->Ticket->read(null, $ticket['Ticket']['id']);
        $this->Ticket->set(['state' => 2]);
        $this->Ticket->save();

        $this->Notification->setToUser($this->User->getKey('pseudo') . ' ' . $this->Lang->get('SUPPORT__NOTIF_CLOS') . ' ' . $ticket['Ticket']['id'] . ' !', $ticket['Ticket']['author']);
        $this->Notification->setToAdmin($this->User->getKey('pseudo') . ' ' . $this->Lang->get('SUPPORT__NOTIF_CLOS') . ' ' . $ticket['Ticket']['id'] . ' !');
        $this->redirect('/admin/support?state=0');
		exit;
    }

    function admin_unclosa_adm($idTicket)
    {
      if (!$this->Permissions->can('MANAGE_TICKETS'))
          throw new ForbiddenException();
      if (!$this->Permissions->can('UNCLOSE_TICKETS'))
          throw new ForbiddenException();

      $this->loadModel('Support.Ticket');
      $this->loadModel('Notification');
      $ticket = $this->Ticket->find('first', ['conditions' => ['id' => $idTicket]]);
      if (empty($ticket))
          throw new NotFoundException();

      $this->Ticket->read(null, $ticket['Ticket']['id']);
      $this->Ticket->set(['state' => 3]);
      $this->Ticket->save();

      $this->Notification->setToUser($this->User->getKey('pseudo') . ' ' . $this->Lang->get('SUPPORT__NOTIF_UNCLOS') . ' ' . $ticket['Ticket']['id'] . ' !', $ticket['Ticket']['author']);
      $this->Notification->setToAdmin($this->User->getKey('pseudo') . ' ' . $this->Lang->get('SUPPORT__NOTIF_UNCLOS') . ' ' . $ticket['Ticket']['id'] . ' !');
	  $this->redirect('/admin/support?state=0');
	  exit;
    }
}
