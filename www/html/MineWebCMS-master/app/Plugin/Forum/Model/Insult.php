<?php
class Insult extends ForumAppModel
{

    public function get()
    {
        return $this->find('all');
    }

    public function add($word, $replace)
    {
        $this->create();
        $this->set(['word' => $word, 'replace' => $replace]);
        return $this->save();
    }

    public function deleteWord($id)
    {
        return $this->delete($id);
    }
}