<?php

class RedirectController extends ForumAppController
{

    public function redirectForum($type, $id = false)
    {
        $this->layout = false;
        $this->autoRender = false;

        switch ($type) {
            case 'topic':

                break;
            case 'message':
                $this->loadModel('Forum.Topic');

                $title = $this->Topic->getTitleTopic($id);
                return $this->redirect("/topic/$title.$id/");
                break;
            case 'mp':

                break;
            default:
                $this->redirect('/forum');
        }
    }

}