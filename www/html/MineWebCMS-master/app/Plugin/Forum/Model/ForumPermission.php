<?php
class ForumPermission extends ForumAppModel
{

    public $useTable = 'forum_permissions';

    public function has($name, $id)
    {
        return $this->find('all', ['conditions' => ['name' => $name, 'group_id' => $id]])[0]['ForumPermission']['value'];
    }

    public function get($id = false)
    {
        if ($id) {
            return $this->find('all', ['conditions' => ['group_id' => $id]]);
        }

        return $this->find('all');
    }

    /*
     * Fun fact Story of 01/02/2017
     * Je voulais appeller cette fonction switch().
     * Malheureusement, on ne peut l'utiliser que depuis PHP7.
     */

    public function _switch($id)
    {
        $value = $this->find('first', ['fields' => 'value', 'conditions' => ['id' => $id]])['ForumPermission']['value'];
        $newValue = ($value) ? 0 : 1;
        return $this->updateAll(['value' => "'".$newValue."'"], ['id' => $id]);
    }

    public function updatePermission($id, $value)
    {
        return $this->updateAll(['value' => $value], ['id' => $id]);
    }

    public function permissionExist($groupId, $name)
    {
        if($this->hasAny(['group_id' => $groupId, 'name' => $name])) return true;
    }

    public function addPermission($groupId, $name, $access)
    {
        $this->create();
        $this->set(['group_id' => $groupId, 'name' => $name, 'value' => $access]);
        return $this->save();
    }

    public function deletePermission($id)
    {
        return $this->delete($id);
    }

    public function _list()
    {
        return $this->find('count', ['conditions' => ['group_id' => 99]]);
    }

    public function findIfInstall($permission)
    {
        $permissions = $this->find('all');
        foreach ($permissions as $key => $p) {
            if ($p['ForumPermission']['name'] == $permission) return false;
        }

        return true;
    }

    public function installNew($datas)
    {
        $this->create();
        $this->set($datas);
        return $this->save();
    }
}