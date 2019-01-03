<?php
class Topic extends ForumAppModel
{

    /*
     * La variable $nbMessage correspond au nombre max de messages qui doivent être afficher avant la pagination.
     * Défault : 10
     */

    private $nbMessage = 10;

    /*
     * La variable $nbTopic correspond au nombre max de topic qui doivent être afficher avant la pagination
     * Défault : 15
     */

    private $nbTopic = 15;

    private $nbMessageProfil = 5;
    
    public function get()
    {
        return $this->find('all');
    }

    public function getTopic($id, $method = false, $params = false)
    {
        if ($method) {
            if ($method == 'stick') {
                return $this->find('all', ['conditions' => ['id_parent' => $id, 'first' => 1, 'stick' => true]]);
            } elseif ($method == 'nostick') {

                $topics = $this->find('all', ['conditions' => ['first' => 1, 'stick' => false, 'id_parent' => $id], 'recursive' => 1, 'order'  => ['date' => 'DESC'], 'limit' => $this->nbTopic, 'page' => $params]);
                if (!empty($topics)) {
                    foreach ($topics  as $key => $topic) {
                        $returns[$key] = $this->find('first', ['conditions' => ['id_topic' => $topic['Topic']['id_topic']], 'order' => ['date' => 'DESC']]);
                    }
                    foreach ($returns as $key => $return) {
                        $order[$key] = $return['Topic']['date'];
                    }
                    array_multisort($order, SORT_DESC, $returns);
                    return $returns;
                }

            } else if($method == 'topic') {
                return $this->find('all', ['conditions' => ['first' => 1]]);
            } else if ($method == 'all') {

                $topics = $this->find('all', ['conditions' => ['first' => 1], 'recursive' => 1, 'order'  => ['date' => 'DESC']]);
                if (!empty($topics)) {
                    foreach ($topics  as $key => $topic) {
                        $returns[$key] = $this->find('first', ['conditions' => ['id_topic' => $topic['Topic']['id_topic']], 'order' => ['date' => 'DESC']]);
                    }
                    foreach ($returns as $key => $return) {
                        $order[$key] = $return['Topic']['date'];
                    }
                    array_multisort($order, SORT_DESC, $returns);
                    return $returns;
                }

            }
        } else {
            return $this->find('all', ['conditions' => ['id_parent' => $id, 'first' => 1]]);
        }
    }

    public function pagination($type, $id)
    {
        if ($type == 'forum') {
            $nbtopics = $this->find('count', ['conditions' => ['first' => 1, 'stick' => false, 'id_parent' => $id]]);
            $nbpages = ceil($nbtopics / $this->nbTopic);
            return ['nbtopic' => $nbtopics, 'nbelement' => $this->nbTopic, 'nbpage' => $nbpages];
        } elseif ($type == 'topic') {
            $nbmessages = $this->getNbMessage('topic', $id);
            $nbpages = ceil($nbmessages / $this->nbMessage);
            return ['nbmessage' => $nbmessages, 'nbelement' => $this->nbMessage, 'nbpage' => $nbpages];
        }
    }

    public function info($type = false, $id = false)
    {
        switch ($type){
            case 'id_parent' :
                return $this->find('first', ['conditions' => ['id_topic' => $id, 'first' => 1]])['Topic']['id_parent'];
                break;
            case 'nb_topic' :
                return $this->find('count', ['conditions' => ['id_parent' => $id, 'first' => 1]]);
                break;
            case 'nb_msg' :
                return $this->find('count', ['conditions' => ['id_parent' => $id]]);
                break;
            case 'title_parent' :
                return $this->find('first', ['conditions' => ['id_topic' => $id, 'first' => 1]])['Topic']['name'];
                break;
            case 'id_topic' :
                return $this->find('first', ['conditions' => ['id' => $id]])['Topic']['id_topic'];
                break;
            case 'id_topic_alt' :
                return $this->find('first', ['conditions' => ['id' => $id]])['Topic']['id_topic'];
                break;
            case 'topic_last_id' :
                return $this->find('first', ['fields' => 'id', 'conditions' => ['id_parent' => $id], 'order' => ['date' => 'DESC']])['Topic']['id'];
                break;
            case 'topic_last_idtopic' :
                return $this->find('first', ['fields' => 'id_topic', 'conditions' => ['id_parent' => $id], 'order' => ['date' => 'DESC']])['Topic']['id_topic'];
                break;
            case 'topic_last_title' :
                $idTopic = $this->find('first', ['fields' => 'id_topic', 'conditions' => ['id_parent' => $id], 'order' => ['date' => 'DESC']])['Topic']['id_topic'];
                return $this->find('first', ['fields' => 'name', 'conditions' => ['id_topic' => $idTopic, 'first' => 1], 'order' => ['date' => 'DESC']])['Topic']['name'];
                break;
            case 'topic_last_date' :
                return $this->find('first', ['fields' => 'MAX(date)', 'conditions' => ['id_parent' => $id]])[0]["MAX(date)"];
                break;
            case 'topic_last_authorid' :
                return $this->find('first', ['fields' => 'id_user', 'conditions' => ['id_parent' => $id], 'order' => ['date' => 'DESC']])['Topic']['id_user'];
                break;
            case 'thumb_green' :
                return $this->find('all', ['fields' => ['sum(thumb_green)'], 'conditions' => ['id_user' => $id]])[0][0]["sum(thumb_green)"];
                break;
            case 'thumb_red' :
                return $this->find('all', ['fields' => ['sum(thumb_red)'], 'conditions' => ['id_user' => $id]])[0][0]["sum(thumb_red)"];
                break;
            case 'topic_author' :
                return $this->find('first', ['fields' => ['id_user'], 'conditions' => ['id_topic' => $id, 'first' => 1]])['Topic']['id_user'];
                break;
            case 'visible' :
                return $this->find('first', ['fields' => ['visible'], 'conditions' => ['id_topic' => $id, 'first' => 1]])['Topic']['visible'];
                break;
            default :
                return false;
                break;
        }
    }

    /*
     * Stats Général
     * $this->Topic->stats();
     */

    public function stats()
    {
        $stats['total_topic'] = $this->find('count', ['conditions' => ['first' => 1]]);
        $stats['total_msg'] = $this->find('count');
        return $stats;
    }

    public function getLastedTopic($method, $id)
    {
        if($method == 'id'){
            return $this->find('first', ['conditions' => ['id_topic' => $id], 'order' => ['date' => 'DESC']])['Topic'];
        }
    }

    public function getNbMessage($type, $id)
    {
        switch ($type) {
            case 'topic' :
                return $this->find('count', ['conditions' => ['id_topic' => $id]]);
                break;
            case 'user' :
                return $this->find('count', ['conditions' => ['id_user' => $id]]);
                break;
            case 'user_topic' :
                return $this->find('count', ['conditions' => ['id_user' => $id, 'first' => 1]]);
                break;
        }
    }

    public function topicExist($id, $slug)
    {
        if($this->hasAny(['id_topic' => $id, 'name' => $slug])) return true;
    }

    public function getMessage($id, $params)
    {
        return $this->find('all', ['conditions' => ['id_topic' => $id], 'order' => ['date' => 'ASC'], 'limit' => $this->nbMessage, 'page' => $params['page']]);
    }

    public function getUniqMessage($id)
    {
        return $this->find('first', ['conditions' => ['id' => $id]])['Topic'];
    }

    public function addMessage($idParent, $idUser, $idTopic, $content, $date)
    {
        $this->create();

        $this->set([
            'id_parent' => $idParent,
            'id_user' => $idUser,
            'id_topic' => $idTopic,
            'content' => $content,
            'date' => $date
        ]);

        return $this->save();
    }

    public function updateMessage($idMessage, $content)
    {
        $content = $this->getDataSource()->value($content, 'text');
        return $this->updateAll(['content' => $content, 'last_edit' => "'".date('Y-m-d H:i:s')."'"], ['id' => $idMessage]);
    }

    public function deleteMessage($id)
    {
        return $this->delete($id);
    }

    public function deleteMessages($id)
    {
        return $this->deleteAll(['id_topic' => $id]);
    }

    public function getUserId($method, $type,  $id)
    {
        return $this->find('first', ['conditions' => [$type => $id]])['Topic'][$method];
    }

    public function addTopic($idParent, $idUser, $title, $stick, $lock, $content)
    {
        $max = ($this->maxIdTopic()) + 1;

        $this->create();

        $this->set([
            'id_parent' => $idParent,
            'id_user' => $idUser,
            'id_topic' => $max,
            'name' => $title,
            'first' => 1,
            'stick' => $stick,
            'lock' => $lock,
            'content' => $content,
            'date' => date('Y-m-d H:i:s')
        ]);

        $this->save();

        return ['title' => $title, 'id_topic' => $max];
    }

    public function maxIdTopic()
    {
        return $this->find('first', ['fields' => 'MAX(id_topic)'])[0]["MAX(id_topic)"];
    }

    public function determine($id)
    {
        $query = $this->find('first', ['fields' => 'id_parent', 'conditions' => ['id_parent' => $id]]);
        if(!empty($query)) return true;

    }

    public function userLastMessage($id)
    {
        return $this->find('all', ['order' => ['date' => 'DESC'], 'limit' => $this->nbMessageProfil, 'conditions' => ['id_user' => $id]]);
    }

    public function determineIsTopic($id)
    {
        return $this->find('first', ['conditions' =>['id' => $id]])['Topic']['first'];
    }

    public function getIdTopic($id)
    {
        return $this->find('first', ['conditions' =>['id_topic' => $id]])['Topic']['id_topic'];
    }

    public function getTitleTopic($id)
    {
        return $this->find('first', ['conditions' => ['id_topic' => $id, 'first' => 1]])['Topic']['name'];
    }

    public function isLock($id)
    {
        return $this->find('first', ['conditions' => ['id_topic' => $id]])['Topic']['lock'];
    }

    public function isStick($id){
        return $this->find('first', ['conditions' => ['id_topic' => $id]])['Topic']['stick'];
    }

    public function change($type, $id)
    {
        if ($type == 'lock') {
            return $this->updateAll(['lock' => 1], ['id_topic' => $id]);
        } elseif ($type == 'unlock') {
            return $this->updateAll(['lock' => 0], ['id_topic' => $id]);
        } elseif ($type == 'stick') {
            return $this->updateAll(['stick' => 1], ['id_topic' => $id]);
        } elseif ($type == 'unstick') {
            return $this->updateAll(['stick' => 0], ['id_topic' => $id]);
        }
    }

    public function moove($id, $to)
    {
        /*
         * $id = Topic id
         * $to = Forum Id destination
         */
        return $this->updateAll(['id_parent' => "'".$to."'"], ['id_topic' => $id]);
    }

    public function rename($id, $newName)
    {
        $newName = $this->getDataSource()->value($newName, 'string');
        return $this->updateAll(['name' => $newName], ['id_topic' => $id, 'first' => 1]);
    }

    public function updateVisible($id, $visible)
    {
        return $this->updateAll(['visible' => "'".$visible."'"], ['id_topic' => $id, 'first' => 1]);
    }

    public function getTag($id)
    {
        return $this->find('first', ['conditions' => ['id_topic' => $id, 'first' => 1]])['Topic']['tags'];
    }

    public function updateTag($id, $newTag)
    {
        $newTag = $this->getDataSource()->value($newTag, 'string');
        return $this->updateAll(['tags' => $newTag], ['id_topic' => $id, 'first' => 1]);
    }

    public function getNbTopic($date, $full = true, $month = false, $year = false)
    {
        if ($month) {
            $max = date("Y-m-d", strtotime("$date +1 month"));
        } elseif ($year) {
            $max = date("Y-m-d", strtotime("$date +1 year"));
        } else{
            $max = date("Y-m-d", strtotime("$date +1 day"));
        }

        if($full) return $this->find('count', ['conditions' => ['date >=' => $date, 'date <' => $max]]);
        else return $this->find('count', ['conditions' => ['first' => 1, 'date >=' => $date, 'date <' => $max]]);
    }

    public function statsTop($topic = false)
    {
        if ($topic) {
            return $this->find('all', ['fields' => ['id_user', 'COUNT(id_user) as count'], 'group' => ['id_user'], 'order' => 'count DESC', 'conditions' => ['first' => 1], 'limit' => 5]);
        } else {
            return $this->find('all', ['fields' => ['id_user', 'COUNT(id_user) as count'], 'group' => ['id_user'], 'order' => 'count DESC', 'limit' => 5]);
        }
    }

}