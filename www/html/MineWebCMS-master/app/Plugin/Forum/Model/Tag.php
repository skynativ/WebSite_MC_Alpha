<?php
class Tag extends ForumAppModel
{

    public function get($id = false)
    {
        return $this->find('all');
    }

    public function add($label, $icon, $color, $position, $used)
    {
        $this->create();
        $this->set(['name' => $label, 'icon' => $icon, 'color' => $color, 'position' => $position, 'used' => $used]);
        return $this->save();
    }

    public function deleteTag($id)
    {
        return $this->delete($id);
    }

}