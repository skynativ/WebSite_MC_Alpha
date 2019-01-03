<?php
class Conversation extends ForumAppModel
{

    public function get($x = false, $y = false)
    {
        if (is_numeric($x) && !$y) {
            return $this->find('all', ['conditions' => ['id_conversation' => $x], 'order' => ['msg_date' => 'ASC']]);
        } elseif (is_numeric($x) && is_numeric($y)) {
            return $this->find('first', ['conditions' => ['id_conversation' => $x], 'order' => ['msg_date' => 'ASC']]);
        } elseif ($x == 'first') {
            $convs = $this->find('all', ['fields' => ['DISTINCT id_conversation']]);

            if (!empty($convs)) {
                foreach ($convs as $key => $conv) {
                    $returns[$key] = $this->find('first', ['conditions' => ['id_conversation' => $conv['Conversation']['id_conversation']], 'order' => ['msg_date' => 'DESC']]);
                }
                foreach ($returns as $key => $return) {
                    $order[$key] = $return['Conversation']['msg_date'];
                }
                array_multisort($order, SORT_DESC, $returns);
                return $returns;
            }

        } else {
            return $this->find('all');
        }
    }

    public function ConversationExist($id, $slug)
    {
        if($this->hasAny(['id_conversation' => $id, 'title' => $slug])) return true;
    }

    public function add($idConv, $first, $title, $idUser, $ip, $content)
    {
        $this->create();
        $this->set(['id_conversation' => $idConv, 'first' => $first, 'title' => $title, 'author_id' => $idUser, 'author_ip' => $ip, 'msg_date' => date('Y-m-d H:i:s'), 'content' => $content]);
        return $this->save();
    }

    public function count()
    {
        return $this->find('count');
    }

    public function statsTop()
    {
        return $this->find('all', ['fields' => ['author_id', 'COUNT(author_id) as count'], 'group' => ['author_id'], 'order' => 'count DESC', 'limit' => 5]);
    }
}