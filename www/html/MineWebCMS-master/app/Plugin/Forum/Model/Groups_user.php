<?php
class Groups_user extends ForumAppModel
{

    public function get($id)
    {
        return $this->find('all', ['conditions' => ['id_user' => $id]]);
    }

    public function getIdGroup($id)
    {
        return @$this->find('all', ['fields' => 'id_group', 'conditions' => ['id_user' => $id]]);
    }

    public function getDomin($id)
    {
        return @$this->find('all', ['fields' => ['id_group', 'domin'], 'conditions' => ['id_user' => $id, 'domin' => 1]]);
    }

    public function getIdGroupDomin($id)
    {
        return @$this->find('all', ['fields' => 'id_group', 'conditions' => ['id_user' => $id, 'domin' => true]])[0]['Groups_user']['id_group'];
    }

    public function updateGroup($state, $domin, $idUser, $idGroup)
    {
        if ($domin && $domin == $idGroup) {
            $this->updateAll(['domin' => 0], ['id_user' => $idUser]);
            $this->updateAll(['domin' => 1], ['id_user' => $idUser, 'id_group' => $idGroup]);
        }

        if ($this->hasAny(['id_user' => $idUser, 'id_group' => $idGroup])) {
            if (empty($state)) {
                $this->deleteAll(['id_user' => $idUser, 'id_group' => $idGroup]);
            }

        } else {
            if ($state) {
                $this->create();
                $this->set(['id_user' => $idUser, 'id_group' => $idGroup, 'domin' => $domin]);
                return $this->save();
            }
        }

    }

    public function _delete($key, $value)
    {
        return $this->deleteAll([$key => $value]);
    }
}