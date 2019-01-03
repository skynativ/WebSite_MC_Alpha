<?php
class Punishment extends ForumAppModel
{

    public function get($id = false)
    {
        if ($id) {
            $punishment = $this->find('first', ['conditions' => ['id_to_user' => $id, 'date >' => date('Y-m-d H:i:s')], 'order' => ['date' => 'DESC']]);
            if(!empty($punishment)) return $punishment['Punishment'];
        } else {
            return $this->find('all');
        }
    }

    public function addPunish($idUser, $idToUser, $date, $reason)
    {
        $this->create();
        $this->set(['id_user' => $idUser, 'id_to_user' => $idToUser, 'date' => $date, 'reason' => $reason]);
        return $this->save();
    }

    public function deletePunish($id)
    {
        $this->delete($id);
    }
}