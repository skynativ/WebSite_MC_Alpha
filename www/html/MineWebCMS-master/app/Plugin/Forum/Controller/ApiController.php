<?php

class ApiController extends ForumAppController
{
    private $i = 0;

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    /*
     * Get lastest message of Forum
     *
     * @param Int $int Number of message
     *
     * @return Array Returns array with lastest topic
     *
     * Example code :
     * $lastTopics = $this->requestAction('/forum/api/getLastMessageForum/5');
     * foreach ($lastTopics as $a){
     *      var_dump($a->title);
     *      var_dump($a->uri);
     *      var_dump($a->lastAuthor);
     *      var_dump($a->lastAuthorColor);
     *      var_dump($a->date);
     *      var_dump($a->isStick);
     *      var_dump($a->isLock);
     * }
     */

    public function getLastMessageForum($int)
    {
        $this->autoRender = false;

        if (!$this->isConnected) {
            $idGroup = 99;
        } else {
            $idGroup = $this->Components->load('ForumPermission')->getDomin($this->getIdSession());
            $idGroup = $idGroup[0]['Groups_user']['id_group'];
        }

        $this->loadModel('Forum.Topic');

        $allTopics = $this->Topic->getTopic(42, 'all');

        $return = '';

        foreach ($allTopics as $key => $a){
            if ($this->viewParent('topic', $a['Topic']['id_topic'])) {
                if ($this->i > $int) break;

                $return[$key]->title = $a['Topic']['name'];
                $return[$key]->uri = $this->buildUri('topic', $a['Topic']['name'], $a['Topic']['id_topic']);
                $return[$key]->lastAuthor = $this->gUBY($a['Topic']['id_user']);
                $return[$key]->lastAuthorColor = $this->ForumPermission->getRankColorDomin($a['Topic']['id_user']);
                $return[$key]->date = $a['Topic']['date'];
                $return[$key]->isStick = $a['Topic']['stick'];
                $return[$key]->isLock = $a['Topic']['lock'];

                $this->i++;
            } else {
                unset($allTopics[$key]);
            }
        }

        return $return;
    }


    /*
     * Get Online Users
     *
     * @param Int $int Maximum number of Users
     *
     * @return Array Returns array with online users
     *
     * Example code :
     * $onlineUsers = $this->requestAction('/forum/api/getOnlineUsers/5');
     * foreach ($onlineUsers as $o){
     *      var_dump($o->id);
     *      var_dump($o->pseudo);
     *      var_dump($o->color);
     * }
     */

    public function getOnlineUsers($max = null)
    {
        $this->autoRender = false;

        $this->loadModel('Forum.Config');
        $this->loadModel('Forum.Forum');
        $this->loadModel('User');

        if ($this->Config->is('useronline')) {

            $return = '';

            $userOnlines = $this->Forum->userOnline($this->User, $max);

            if (!empty($userOnlines)) {
                foreach ($userOnlines as $key => $userOnline) {
                    $return[$key] = (object) [];
                    $return[$key]->id = $userOnline['User']['id'];
                    $return[$key]->pseudo = $userOnline['User']['pseudo'];
                    $return[$key]->color = $this->ForumPermission->getRankColorDomin($userOnline['User']['id']);
                }
            }

            return $return;
        } else {
            return $this->log($this->Lang->get('FORUM__API__ONLINEUSER__DENIED'));
        }
    }


    /*
     * Get Statistics
     *
     * Example code :
     * $stats = $this->requestAction('/forum/api/getStats');
     * var_dump($stats->nbUserOnline);
     * var_dump($stats->totalTopic);
     * var_dump($stats->totalMessage);
     */

    public function getStats()
    {
        $this->autoRender = false;

        $this->loadModel('Forum.Config');
        $this->loadModel('Forum.Topic');

        if ($this->Config->is('statistics')) {

            $return = (object) [];
            $return->nbUserOnline = count($this->getOnlineUsers());

            $stats = $this->Topic->stats();
            $return->totalTopic = $stats['total_topic'];
            $return->totalMessage = $stats['total_msg'];

            return $return;
        } else {
            return $this->log($this->Lang->get('FORUM__API__STATS__DENIED'));
        }
    }

}