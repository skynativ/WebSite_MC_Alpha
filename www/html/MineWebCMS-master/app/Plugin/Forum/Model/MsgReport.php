<?php
class MsgReport extends ForumAppModel
{

    public function get($id = false)
    {
        if ($id) {
            return $this->find('all', ['conditions' => ['id_user' => $id], 'order' => ['date' => 'DESC']]);
        } else {
            return $this->find('all');
        }
    }

    public function report($idUser, $idMessage, $date, $reason, $content)
    {
        $this->create();
        $this->set(['id_user' => $idUser, 'id_msg' => $idMessage, 'date' => $date, 'reason' => $reason, 'content' => $content]);
        return $this->save();
    }

    public function deleteReport($id)
    {
        $this->delete($id);
    }
}