<?php
class Internal extends ForumAppModel
{

    public function get($slug)
    {
        if ($slug) {
            $value = $this->find('first', ['conditions' => ['internal_name' => $slug]]);
            if (array_key_exists('internal_value', $value['Internal'])) {
                return $value['Internal']['internal_value'];
            }
        }

        return $this->find('all');
    }

    public function update($key, $value)
    {
        $value = $this->getDataSource()->value($value, 'string');
        return $this->updateAll(['internal_value' => $value], ['internal_name' => $key]);
    }
}