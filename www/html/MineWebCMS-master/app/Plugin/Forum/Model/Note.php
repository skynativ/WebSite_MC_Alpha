<?php
class Note extends ForumAppModel
{

    private $nbNote = 5;

    public function getNbThumb($type, $id  = false)
    {
        switch ($type) {
            case 'total_green' :
                return $this->find('count', ['conditions' => ['type' => 1]]);
                break;
            case 'total_red' :
                return $this->find('count', ['conditions' => ['type' => 2]]);
                break;
            case 'green' :
                return $this->find('count', ['conditions' => ['id_to_user' => $id, 'type' => 1]]);
                break;
            case 'red' :
                return $this->find('count', ['conditions' => ['id_to_user' => $id, 'type' => 2]]);
                break;
            case 'msg_green':
                return $this->find('count', ['conditions' => ['id_message' => $id, 'type' => 1]]);
                break;
            case 'msg_red':
                return $this->find('count', ['conditions' => ['id_message' => $id, 'type' => 2]]);
                break;
        }
    }

    public function stats($type, $id)
    {
        switch ($type) {
            case 'green' :
                return $this->find('count', ['conditions' => ['id_user' => $id, 'type' => 1]]);
                break;
            case 'red' :
                return $this->find('count', ['conditions' => ['id_user' => $id, 'type' => 2]]);
                break;
        }
    }

    public function isNoted($type, $idMsg, $idUser)
    {
        switch ($type) {
            case 'green' :
                return $this->find('count', ['conditions' => ['id_message' => $idMsg, 'id_user' => $idUser,  'type' => 1]]);
                break;
            case 'red' :
                return $this->find('count', ['conditions' => ['id_message' => $idMsg, 'id_user' => $idUser, 'type' => 2]]);
                break;
        }
    }

    public function search($id_user, $idToUser, $id)
    {
        return $this->find('first', ['conditions' => ['id_user' => $id_user, 'id_to_user' => $idToUser, 'id_message' => $id]]);
    }

    public function addThumb($idUser, $toUser, $idMsg, $type)
    {
        $this->create();
        $this->set(['id_user' => $idUser, 'id_to_user' => $toUser, 'id_message' => $idMsg, 'type' => $type]);
        return $this->save();
    }

    public function removeThumb($id)
    {
        return $this->delete($id);
    }

    public function userLastNote($id)
    {
        return $this->find('all', ['order' => ['id' => 'DESC'], 'limit' => $this->nbNote, 'conditions' => ['id_user' => $id]]);
    }
}