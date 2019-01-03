<?php

class MessageController extends ForumAppController
{

    public $components = [
        'Security' => [
            'csrfExpires' => '+1 hour'
        ]
    ];

    public function beforeFilter()
    {
        parent::beforeFilter();

        $this->loadModel('User');
        $this->loadModel('Forum.Punishment');
        $this->User->updateAll(array('forum-last_activity' => "'".date("Y-m-d H:i:s")."'"), array('id' => $this->Session->read('user')));
        $this->Security->csrfExpires = '+1 hour';

        if (!in_array($this->request->params['action'], ['banned', 'admin_punishment', 'admin_delete']) && $this->Punishment->get($this->getIdSession())) {
            $this->redirect('/forum/banned');
        }

        $this->loadModel('Forum.Config');
        $this->loadModel('Forum.Conversation');
        $this->loadModel('Forum.ConversationRecipient');

        if($this->theme == 'Justice') $this->layout = 'forum';
    }

    public function index()
    {

        if ($this->isConnected && $this->Config->is('privatemsg')) {
            $messages = $this->Conversation->get('first');
            if ($messages) {
                foreach ($messages as $key => $message) {
                    $ids[$key] = $message['Conversation']['id_conversation'];
                    if(!$this->ConversationRecipient->perm($ids[$key], $this->getIdSession())){
                        unset($ids[$key]);
                    }
                }

                if (!empty($ids)) {
                    foreach ($ids as $key => $id) {
                        $mps[$key] = $this->Conversation->get($id, $id);
                        $mps[$key]['Conversation']['msg_date'] = $this->dateAndTime($mps[$key]['Conversation']['msg_date']);
                        $mps[$key]['Conversation']['last_msg_date'] = $this->dateAndTime($messages[$key]['Conversation']['msg_date']);
                        $mps[$key]['Conversation']['user'] = $this->gUBY($mps[$key]['Conversation']['author_id']);
                        $mps[$key]['Conversation']['href'] = $this->buildUri('message', $mps[$key]['Conversation']['title'], $mps[$key]['Conversation']['id_conversation']);
                        $mps[$key]['Conversation']['user_color'] = $this->ForumPermission->getRankColorDomin($mps[$key]['Conversation']['author_id']);
                    }
                }
            }
            $theme = $this->theme();
            $this->set(compact('mps', 'theme', 'messages'));
        } else {
            throw new NotFoundException();
        }
    }

    public function newMessage($to = false)
    {
        if ($this->isConnected && $this->Config->is('privatemsg') && $this->ForumPermission->has('FORUM_MP_SEND')) {
            if ($this->request->is('post')){
                $this->autoRender = false;
                if (!empty($this->request->data['recipient']) && !empty($this->request->data['title']) && !empty($this->request->data['content'])) {

                    $recipient = explode(',', $this->request->data['recipient']);
                    $maxId = $this->ConversationRecipient->maxIdMp()+1;

                    foreach ($recipient as $key => $r) {
                        if ($this->pseudoExist($r)) {
                            $idto = $this->User->getFromUser('id', $r);
                            $this->ConversationRecipient->add($maxId, $idto);
                            $this->ConversationRecipient->add($maxId, $this->getIdSession());

                            $author = $this->User->getFromUser('id', $r);
                            if ($author != $this->getIdSession()) {
                                $this->notification('send_mp', $author, $this->getIdSession(), 'User');
                            }
                        }
                    }
                    $title = trim($this->request->data['title']);
                    $content = $this->request->data['content'];

                    $this->Conversation->add($maxId, 1, $title, $this->getIdSession(), $this->Util->getIP(), $content);



                    $this->Session->setFlash($this->Lang->get('FORUM__MESSAGE__SEND'), 'default.success');
                } else {
                    $this->Session->setFlash($this->Lang->get('FORUM__ADD__FAILED'), 'default.error');
                }

                $this->redirect('/message');
            } else {
                $theme = $this->theme();
                $this->set(compact('theme', 'to'));
            }
        } else {
            throw new NotFoundException();
        }
    }

    public function view($id, $slug)
    {
        if ($this->isConnected && $this->Config->is('privatemsg')) {
            if ($this->ConversationRecipient->perm($id, $this->getIdSession())) {
                if ($this->Conversation->ConversationExist($id, $this->replaceHyppen($slug))) {

                    if ($this->request->is('post')) {
                        if ($this->ForumPermission->has('FORUM_MP_REPLY')) {
                            if (!empty($this->request->data['content'])) {
                                $content = $this->request->data['content'];
                                $this->Conversation->add($id, 0, '', $this->getIdSession(), $this->Util->getIP(), $content);

                                $recipients = $this->ConversationRecipient->get($id, true);
                                foreach ($recipients as $r) {
                                    $idUser = $r['ConversationRecipient']['author_recipient'];

                                    if ($idUser != $this->getIdSession()) {
                                        $this->notification('respond_mp', $idUser, $this->getIdSession(), 'User');
                                    }
                                }

                                $this->Session->setFlash($this->Lang->get('FORUM__MESSAGE__SEND'), 'default.success');
                            } else {
                                $this->Session->setFlash($this->Lang->get('FORUM__ADD__FAILED'), 'default.error');
                            }

                        } else {
                            $this->Session->setFlash($this->Lang->get('FORUM__PERMISSION_NECESSARY'), 'default.error');
                        }

                        $this->redirect('/message/'.$this->replaceHyppen($slug).'.'.$id.'/');
                    }

                    $mps = $this->Conversation->get($id);

                    foreach ($mps as $key => $mp) {
                        $mps[$key]['Conversation']['msg_date'] = $this->dateAndTime($mps[$key]['Conversation']['msg_date']);
                        $mps[$key]['Conversation']['author_user'] = $this->gUBY($mp['Conversation']['author_id']);
                        $mps[$key]['Conversation']['author_color'] = $this->ForumPermission->getRankColorDomin($mp['Conversation']['author_id']);
                        $mps[$key]['Conversation']['author_rank']['rank'] = $this->ForumPermission->getRank($mp['Conversation']['author_id']);
                        $mps[$key]['Conversation']['author_rank']['color'] = $this->ForumPermission->getRankColor($mp['Conversation']['author_id']);
                    }

                    $perms = $this->perm_l();
                    $theme = $this->theme();
                    $this->set(compact('perms', 'mps', 'theme'));
                } else {
                    throw new NotFoundException();
                }
            } else {
                throw new NotFoundException();
            }
        } else {
            throw new NotFoundException();
        }
    }

    public function delete($id)
    {
        if ($this->ConversationRecipient->perm($id, $this->getIdSession())) {
            $this->ConversationRecipient->_delete($id, $this->getIdSession());
        } else {
            throw New ForbiddenException();
        }

        return $this->redirect(Router::url('/', true).'message');
    }

    private function pseudoExist($slug)
    {
        if (!empty($this->User->find('first', ['conditions' => ['pseudo' => $slug]]))) {
            return true;
        }
    }
}