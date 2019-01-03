<?php
class Config extends ForumAppModel
{

    public function get()
    {
        return $this->find('all');
    }

    public function is($config)
    {
        return $this->find('first', ['conditions' => ['config_name' => $config]])['Config']['config_value'];
    }

    public function updateConfig($name, $value)
    {
        return $this->updateAll(['config_value' => "'".$value."'"], ['config_name' => $name]);
    }

    public function notempty()
    {
        return $this->hasAny(['config_name' => 'forum']);
    }
}