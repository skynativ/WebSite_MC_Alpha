<?php

class ThemeController extends ForumAppController
{

    private $css;

    private $cssTextColor = "color";

    public function generate()
    {
        $this->loadModel('Forum.Internal');

        $this->layout = false;
        $this->autoRender = false;
        $this->response->type('css');

        $internal['background'] = unserialize($this->Internal->get('background'));

        switch ($internal['background']['type']) {
            case 'image':
                $this->css .= ".background-forum{background-image:url({$internal['background']['value']});background-size:cover;background-attachment:fixed;background-position:center;background-repeat:no-repeat;min-height:100vh;}";
                break;
            case 'color':
                $this->css .= ".background-forum{background-color:{$internal['background']['value']};}";
                break;
        }

        $internal['icons'] = unserialize($this->Internal->get('icons'));

        if (!empty($internal['icons'])) {
            $this->setPropretie('forum-breadcrumb-fahome', $this->cssTextColor, $internal['icons']['home']);
            $this->setPropretie('forum-breadcrumb-faflag', $this->cssTextColor, $internal['icons']['flag']);
            $this->setPropretie('forum-breadcrumb-faenvelope', $this->cssTextColor, $internal['icons']['envelope']);
            $this->setPropretie('forum-breadcrumb-fauser', $this->cssTextColor, $internal['icons']['user']);
            $this->setPropretie('forum-breadcrumb-fasignout', $this->cssTextColor, $internal['icons']['out']);
            $this->setPropretie('forum-breadcrumb-fasignin', $this->cssTextColor, $internal['icons']['in']);
        }

        return $this->css;
    }

    private function setPropretie($index, $propretie, $value){
        if (!empty($value)) {
            $this->css .= ".".$index."{".$propretie.":".$value."}";
        }
    }

}