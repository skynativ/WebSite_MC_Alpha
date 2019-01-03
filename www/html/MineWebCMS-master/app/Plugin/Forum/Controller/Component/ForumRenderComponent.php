<?php

class ForumRenderComponent extends Component
{

    public $none = '';

    public function index($type, $value)
    {
        if(!empty($value['data'])){
            switch ($type){
                case 'style':
                    return $this->style($value['type'], $value['data']);
                    break;
                case 'pagination':
                    return $this->pagination($value['style'], $value['page'], $value['nbpage']);
                    break;
            }
        }else{
            return $this->none;
        }
    }

    //Example : $this->forumRender('style', ['type' => 'background-color', 'data' => $x]);

    public function style($type, $value)
    {
        if($type == 'color'){
            foreach ($value as $key => $val){
                $value[$key] = ' style="color:#'.$val.'"';
            }
            return $value;
        }elseif('background-color'){
            foreach ($value as $key => $val){
                $value[$key] = ' style="background-color:#'.$val['color'].'"';
            }
            return $value;
        }

    }

    // Example : $this->forumRender('pagination', [$x = true, 'style' => 'sm', 'page' => $page 'offset' => $x, 'nbpage' => $y, 'limit' => $z, 'element' => $x1, 'topic' => $y1);
    // $render .= '';

    public function pagination($style, $page, $nbpage)
    {
        if($page > $nbpage && $page != 1){
            $slug = $this->_Collection->getController()->request->{"params"}['slug'];
            $id = $this->_Collection->getController()->request->{"params"}['id'];

            $this->_Collection->getController()->redirect('/forum/'.$slug.'.'.$id.'/');
        }
        if($nbpage > 1){
            $link = './';
            $total = $nbpage;
            $current = $page;
            $adj = 2;

            $prev = $current - 1;
            $next = $current + 1;
            $penultimate = $total - 1;

            $render = '<div class="row">';
            $render .= '<div class="col-md-12">';
            $render .= '<nav aria-label="Page navigation">';
            $render .= '<ul class="pagination pagination-'.$style.' pull-right">';

            if($total > 1) {
                if($current == 2) $render .= '<li><a href="'.$link.'">«</a></li>';
                elseif($current > 2) $render .= '<li><a href="'.$link.$prev.'"  aria-label="Previous">«</a></li>';
                else $render .= '<li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';

                if($total < 7 + ($adj * 2)){
                    $render .= ($current == 1) ? '<li class="active"><a>1</a></li>' : '<li><a href="'.$link.'">1</a></li>';
                    for($i = 2; $i <= $total; $i++) $render .= ($i == $current) ? '<li class="active"><a href="#">'.$i.'</a></li>' : '<li><a href="'.$link.$i.'">'.$i.'</a></li>';
                }else{
                    if($current < 2 + ($adj * 2)){
                        $render .= ($current == 1) ? '<li class="active"><a>1</a></li>' : '<li><a href="'.$link.'">1</a></li>';
                        for ($i = 2; $i < 4 + ($adj * 2); $i++) $render .= ($current == $i) ? '<li class="active"><a>'.$i.'</a></li>' : '<li><a href="'.$link.$i.'">'.$i.'</a></li>';

                        $render .= '<li><a>…</a></li>';
                        $render .= '<li><a href="'.$link.$penultimate.'">'.$penultimate.'</a></li>';
                        $render .= '<li><a href="'.$link.$total.'">'.$total.'</a></li>';
                    }elseif((($adj * 2) + 1 < $current) && ($current < $total - ($adj * 2))){
                        $render .= '<li><a href="'.$link.'">1</a></li>';
                        $render .= '<li><a href="'.$link.'2">2</a></li>';
                        $render .= '<li><a>…</a></li>';

                        for ($i = $current - $adj; $i <= $current + $adj; $i++) $render .= ($current == $i) ? '<li class="active"><a>'.$i.'</a></li>' : '<li><a href="'.$link.$i.'">'.$i.'</a></li>';

                        $render .= '<li><a>…</a></li>';
                        $render .= '<li><a href="'.$link.$penultimate.'">'.$penultimate.'</a></li>';
                        $render .= '<li><a href="'.$link.$total.'">'.$total.'</a></li>';
                    }else{
                        $render .= '<li><a href="'.$url.'">1</a></li>';
                        $render .= '<li><a href="'.$url.$link.'2">2</a></li>';
                        $render .= '<li><a>…</a></li>';
                        for ($i = $total - (2 + ($adj * 2)); $i <= $total; $i++) $render .= ($i == $current) ? '<li class="active"><a href="#">'.$i.'</a></li>' : '<li><a href="'.$link.$i.'">'.$i.'</a></li>';
                    }
                }
                $render .= ($current == $total) ? '<li class="disabled"><a href="#" aria-label="Next"><span>»</span></a></li>' : '<li><a href="'.$link.$next.'" aria-label="Next"><span>»</span></a></li>';

                $render .= '</ul>';
                $render .= '</nav>';
                $render .= '</div>';
                $render .= '</div>';
            }
            return $render;
        }
    }

}