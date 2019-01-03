<?php
class Historie extends ForumAppModel {

    /*
     * Category
     * - add_message
     * - delete_message
     * - edit_message
     * - report_message
     *
     * - add_rank
     * - edit_rank
     * - delete_rank
     *
     * - create_topic
     *
     * - add_thumb
     * - remove_thumb
     *
     * - edit_config
     *
     * - create_forum
     * - edit_forum
     * - delete_forum
     *
     * - create_category
     * - edit_category
     * - delete_category
     *
     * - add_word
     * - delete_word
     */

    public function add($ip, $idUser, $category, $action, $content)
    {
        $this->create();
        $this->set(['date' => date('Y-m-d H:i:s'), 'ip' => $ip, 'id_user' => $idUser, 'category' => $category, 'action' => $action, 'content' => $content]);
        $this->save();
    }

    public function _list($id)
    {
        return $this->find('all', ['conditions' => ['id_user' => $id], 'order' => ['date' => 'DESC']]);
    }

    public function get($category = false, $param = false)
    {
        if (empty($category)) {
            return $this->find('all', ['order' => ['date' => 'DESC']]);
        } else {
            if (empty($param)) {
                return $this->find('all', ['conditions' => ['category' => $category], ['order' => ['date' => 'DESC']]]);
            } else {
                if (!array_key_exists('ip', $param)) {
                    $param['ip'] = '1 = 1';
                }
                if (!array_key_exists('idUser', $param)) {
                    $param['idUser'] = '1 = 1';
                }
                return $this->find('all', ['conditions' => ['category' => $category, 'ip' => $param['ip'], 'id_user' => $param['idUser']], ['order' => ['date' => 'DESC']]]);
            }
        }

    }

    public function drop($ip, $idUser)
    {
        $this->deleteAll(['1 = 1']);
        $this->add($ip, $idUser, 'general', 'Effacer l\'historique forum', '');
    }
}