<?php
class Vieww extends ForumAppModel
{

    //Total de view
    // var_dump($this->Vieww->countTotal());

    // Nombre de vues pour les X derniers jours
    // stats['notreat']['view'] = $this->Vieww->stats(7);

    public function get()
    {
        return $this->find('all');
    }

    public function exist($ip, $idTopic)
    {
        return $this->find('first', ['conditions' => ['ip' => $ip, 'id_topic' => $idTopic, 'date >' => date('Y-m-d H:i:s', strtotime('-2 day'))]]);
    }

    public function addView($ip, $idTopic)
    {
        $this->create();
        $this->set(['date' => date('Y-m-d H:i:s'), 'ip' => $ip, 'id_topic' => $idTopic]);
        return $this->save();
    }

    public function count($id)
    {
        return $this->find('count', ['conditions' => ['id_topic' => $id]]);
    }

    public function countTotal()
    {
        return $this->find('count');
    }

    public function stats($nbDay)
    {
        return $this->find('count', ['conditions' => ['date >' => date('Y-m-d H:i:s', strtotime('-'.$nbDay.' day'))]]);
    }

    public function getView($date, $month = false, $year = false)
    {
        if ($month) {
            $max = date("Y-m-d", strtotime("$date +1 month"));
        } elseif ($year) {
            $max = date("Y-m-d", strtotime("$date +1 year"));
        } else{
            $max = date("Y-m-d", strtotime("$date +1 day"));
        }

        return $this->find('count', ['conditions' => ['date >=' => $date, 'date <' => $max]]);
    }

    public function statsTop()
    {
        return $this->find('all', ['fields' => ['id_topic', 'COUNT(id_topic) as count'], 'group' => ['id_topic'], 'order' => 'count DESC', 'limit' => 5]);
    }

}