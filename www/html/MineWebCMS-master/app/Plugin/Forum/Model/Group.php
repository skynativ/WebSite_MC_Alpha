<?php
class Group extends ForumAppModel
{

    public function get($id = false)
    {
        if ($id) {
            return $this->find('first', ['conditions' => ['id' => $id]])['Group'];
        } else {
            return $this->find('all', ['order' => ['position' => 'ASC']]);
        }
    }

    public function deleteGroup($id)
    {
        return $this->delete($id);
    }

    // 99  is a group of members, it's not defined
    public function getRankColor($id)
    {
        if ($id != 99) {
            return $this->find('first', ['fields' => ['color', 'position'], 'conditions' => ['id' => $id]])['Group'];
        }
    }

    public function getRank($id)
    {
       if ($id != 99) return $this->find('first', ['fields' => ['group_name', 'position'], 'conditions' => ['id' => $id]])['Group'];
    }

    public function getRanks($id)
    {
        if($id != 99) return $this->find('first', ['conditions' => ['id' => $id]])['Group'];
    }

    public function addGroup($rank, $description, $color, $position)
    {
        $this->create();
        $this->set(['group_name' => $rank, 'group_description' => $description, 'color' => $color, 'position' => $position]);
        return $this->save()['Group']['id'];
    }

    public function getName($id)
    {
        $names = $this->find('all', ['fields' => 'group_name', 'conditions' => ['id' => $id]]);
        if(!empty($names)) return $names[0]['Group']['group_name'];
    }

    public function updateRank($name, $description, $color, $id, $position)
    {
        $name = $this->getDataSource()->value($name, 'string');
        $description = $this->getDataSource()->value($description, 'string');
        $color = $this->getDataSource()->value($color, 'string');
        $position = $this->getDataSource()->value($position, 'string');

        return $this->updateAll(['group_name' => $name, 'group_description' => $description, 'color' => $color, 'position' => $position], ['id' => $id]);;
    }
}