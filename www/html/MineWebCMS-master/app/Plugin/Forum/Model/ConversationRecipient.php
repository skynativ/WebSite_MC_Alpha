<?php

class ConversationRecipient extends ForumAppModel
{

    public function get($id = false, $inverse = false)
    {
        if ($id && !$inverse) {
            return $this->find('all', ['conditions' => ['author_recipient' => $id]]);
        } elseif ($inverse) {
            return $this->find('all', ['conditions' => ['id_conversation' => $id]]);
        }

        return $this->find('all');
    }


    public function perm($id, $idUser)
    {
        return ($this->hasAny(['id_conversation' => $id, 'author_recipient' => $idUser])) ? true : false;
    }

    public function add($idConv, $idTo)
    {
        $this->create();
        $this->set(['id_conversation' => $idConv, 'author_recipient' => $idTo]);
        return $this->save();
    }

    public function maxIdMp()
    {
        return $this->find('first', ['fields' => 'MAX(id_conversation)'])[0]["MAX(id_conversation)"];
    }

    public function _delete($id, $idUser)
    {
        return $this->deleteAll(['id_conversation' => $id, 'author_recipient' => $idUser]);
    }

}