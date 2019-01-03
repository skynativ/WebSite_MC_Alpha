<?php

class UserController extends ForumAppController
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
        $this->User->updateAll(array('forum-last_activity' => "'".date("Y-m-d H:i:s")."'"), array('id' => $this->Session->read('user')));
        $this->Security->csrfExpires = '+1 hour';

        if($this->theme == 'Justice') $this->layout = 'forum';
    }

    public function index($id, $slug)
    {
        if($this->userExist($id, $slug)){
            $this->loadModel('Forum.Config');
            $this->loadModel('Forum.Topic');
            $this->loadModel('Forum.Note');
            $this->loadModel('Forum.Profile');

            if($this->Config->is('userpage')){
                $infos['nb_message'] = $this->Topic->getNbMessage('user', $id);
                $infos['inscription'] = $this->date($this->dateInscription($id));
                $infos['thumb']['green'] = $this->Note->getNbThumb('green', $id);
                $infos['thumb']['red'] = $this->Note->getNbThumb('red', $id);

                $lasts['Comment'] = $this->Topic->userLastMessage($id);
                foreach($lasts['Comment'] as $key => $last){
                    $lasts['Comment'][$key]['Topic']['title'] = $this->Topic->info('title_parent', $last['Topic']['id_topic']);
                    $lasts['Comment'][$key]['Topic']['href'] = $this->buildUri('topic', $lasts['Comment'][$key]['Topic']['title'], $lasts['Comment'][$key]['Topic']['id_topic']);
                }

                $lasts['Note'] = $this->Note->userLastNote($id);
                foreach($lasts['Note'] as $key => $last){
                    $lasts['Note'][$key]['Note']['txt'] = ($last['Note']['type'] == 1) ? $this->Lang->get('FORUM__PHRASE__PROFILE__GREENTHUMB') : $this->Lang->get('FORUM__PHRASE__PROFILE__REDTHUMB');
                    $lasts['Note'][$key]['Note']['class'] = ($last['Note']['type'] == 1) ? 'green' : 'red';
                    $lasts['Note'][$key]['Note']['fa'] = ($last['Note']['type'] == 1) ? 'up' : 'down';
                    $lasts['Note'][$key]['Note']['message'] = $this->Topic->getUniqMessage($last['Note']['id_message'])['content'];
                    $lasts['Note'][$key]['Note']['msg']['id'] = $this->Topic->info('id_topic', $last['Note']['id_message']);
                    $lasts['Note'][$key]['Note']['msg']['title'] = $this->Topic->info('title_parent', $lasts['Note'][$key]['Note']['msg']['id']);
                    $lasts['Note'][$key]['Note']['msg']['href'] = $this->buildUri('topic', $lasts['Note'][$key]['Note']['msg']['title'], $lasts['Note'][$key]['Note']['msg']['id'], $last['Note']['id_message']);
                }

                $ranks['rank'] = $this->ForumPermission->getRank($id);
                $ranks['color'] = $this->ForumPermission->getRankColor($id);
                $ranks['color'] = $this->forumRender('style', ['type' => 'background-color', 'data' => $ranks['color']]);

                $userForum = $this->Profile->get($id);
                if(empty($userForum['description'])){
                    $userForum['description'] = 'Aucune description n\'est disponible.';
                }
                $userForum['color'] = $this->ForumPermission->getRankColorDomin($id);
                $active['socialnetwork'] = ($this->Config->is('socialnetwork')) ? true : false;
                $theme = $this->theme();
                $socialNetworks = $this->socialNetwork($id);

                $this->set(compact('slug', 'id', 'infos', 'lasts', 'ranks', 'userForum', 'theme', 'socialNetworks', 'active'));
            }else{
                throw new NotFoundException();
            }
        }else{
            throw new NotFoundException();
        }
    }

    public function edit($id, $slug)
    {
        if($this->userExist($id, $slug)){
            if($this->getIdSession() == $id){
                $this->loadModel('Forum.Config');
                $this->loadModel('Forum.Profile');
                $active['userpage'] = ($this->Config->is('userpage')) ? true : false;
                $active['socialnetwork'] = ($this->Config->is('socialnetwork')) ? true : false;
                if($active['userpage']) {
                    if ($this->request->is('post')) {
                        $description = $this->request->data['description'];
                        $this->Profile->updateProfile($description, $this->getIdSession());
                        $this->logforum($this->getIdSession(), 'edit_profile', $this->gUBY($this->getIdSession()) . ' vient d\'editer son profil ', $this->request->data['description']);

                        if($active['socialnetwork']){
                            $facebook = $this->request->data['facebook'];
                            $twitter = $this->request->data['twitter'];
                            $youtube = $this->request->data['youtube'];
                            $googleplus = $this->request->data['googleplus'];
                            $snapchat = $this->request->data['snapchat'];
                            $socials = json_encode([
                                'facebook' => $facebook,
                                'twitter' => $twitter,
                                'youtube' => $youtube,
                                'googleplus' => $googleplus,
                                'snapchat' => $snapchat
                            ]);
                            $this->Profile->updateSocials($id, $socials);
                        }

                        $this->Session->setFlash($this->Lang->get('FORUM__EDIT__PROFILE'), 'default.success');
                    }
                    $infos = $this->Profile->get($id);
                    $socialNetworks = $this->socialNetwork($id);
                    $theme = $this->theme();

                    $this->set(compact('infos', 'theme', 'socialNetworks', 'active'));
                }else{
                    throw new NotFoundException();
                }
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new NotFoundException();
        }
    }

    private function userExist($id, $slug)
    {
        $query = $this->User->find('first', ['conditions' => ['id' => $id, 'pseudo' => $slug]]);
        return (empty($query)) ? false : true;
    }
}