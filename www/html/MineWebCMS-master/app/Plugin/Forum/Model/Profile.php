<?php
class Profile extends ForumAppModel
{

    public function get($id = false)
    {
        if ($id) {
            if($this->hasAny(['id_user' => $id])) {
                return $this->find('first', ['conditions' => ['id_user' => $id]])['Profile'];
            }

            return ['description' => ''];
        } else {
            return $this->find('all');
        }
    }

    public function updateProfile($description, $idUser)
    {
        if ($this->hasAny(['id_user' => $idUser])) {
            $description = $this->getDataSource()->value($description, 'string');
            return $this->updateAll(['description' => $description], ['id_user' => $idUser]);
        } else {
            $this->create();
            $this->set(['id_user' => $idUser, 'description' => $description]);
            return $this->save();
        }
    }

    public function getSocial($id)
    {
        if ($this->hasAny(['id_user' => $id])) {
            return $this->find('first', ['conditions' => ['id_user' => $id]])['Profile']['social'];
        } else {
            $array = [
                'facebook' => '',
                'twitter' => '',
                'youtube' => '',
                'googleplus' => '',
                'snapchat' => ''
            ];
            return json_encode($array);
        }
    }

    public function updateSocials($id, $social)
    {
        $social = str_replace("'", "", $social);
        $social = $this->getDataSource()->value($social, 'string');
        return $this->updateAll(['social' => $social], ['id_user' => $id]);
    }

    public function count()
    {
        return $this->find('count');
    }
}