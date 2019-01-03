<?php
class CodeController extends AppController {

    public function index(){
        $this->set('title_for_layout', $this->Lang->get('CCADEAU__TITLE'));
    }

    public function admin_index(){
        if($this->isConnected AND $this->User->isAdmin()){
            $this->set('title_for_layout', $this->Lang->get('CCADEAU__TITLE'));
            $this->layout = 'admin';
            $codes = $this->Code->find('all');

            //VERIF_VERSION_INSTALL
            $plugins = $this->EyPlugin->pluginsLoaded;
            $version_install = $plugins->{'empiredev.codecadeau.74'}->{'version'};

            //VERIF_VERSION_MARKET
            #Suppression de l'api mineweb car elle a été supprimé. Pour le moment pas de vérification de mise à jour.
            #Ancien code avec l'api mineweb :
            #$version_up = null;
            #$json = file_get_contents('http://api.mineweb.org/api/v2/plugin/all');
            #$json = json_decode($json, true);
            #foreach($json as $pl){
            #   if($pl['id'] == "74"){
            #     $version_up = $pl['version'];
            #   }
            #}
            $isUpdateAvaible = false;
            #if($version_install != $version_up){
            #   $isUpdateAvaible = true;
            #}
            $this->set(compact('isUpdateAvaible'));

            $this->set(compact("codes"));
        }
        else
            throw new ForbiddenException();
    }
    
    public function admin_add_code(){
        $this->layout = 'admin';
        $this->autoRender = false;
        if($this->isConnected && $this->User->isAdmin()){
            if($this->request->is('post')) {
                $code_cadeau = $this->request->data['code_cadeau'];
                $point_cadeau = $this->request->data['point_cadeau'];
                if(!isset($code_cadeau) && empty($code_cadeau)){
                    $errors .= $this->Lang->get('CCADEAU__ERROR_INPUT_NAME_CODE')." <br/>";
                }
                if(!isset($point_cadeau) && empty($point_cadeau)){
                    $errors .= $this->Lang->get('CCADEAU__ERROR_INPUT_POINT_CODE')." <br/>";
                }
                if(isset($errors))
                {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => "<br/>".$errors)));
                    return;
                }else{
                    $code = $this->Code->getCodeByCode($code_cadeau, 'code');
                    if(isset($code)){
                        $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('CCADEAU__ALREADY_EXIST'))));
                        return;
                    }else{
                        $this->Code->set(array(
                            'code' => $code_cadeau,
                            'point' => $point_cadeau,
                        ));
                        $this->Code->save();
                        $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('CCADEAU__SUCCESS_CREATE'))));
                        return;
                    }
                }
            }
        }
        else
          throw new ForbiddenException();
    }

    public function claim_code(){
        $this->layout = null;
        $this->autoRender = false;
        if($this->isConnected){
            if($this->request->is('post')) {
                $code_cadeau = $this->request->data['code_cadeau'];
                if(empty($code_cadeau)){
                    $errors .= $this->Lang->get('CCADEAU__ERROR_INPUT_NAME_CODE');
                }
                if(isset($errors))
                {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $errors)));
                    return;
                }else{
                    $this->loadModel('CodeCadeau.Code');
                    $this->loadModel('User');
                    $code = $this->Code->getCodeByCode($code_cadeau, 'code');
                    if(empty($code))
                    {
                        $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('CCADEAU__NO_EXISTING'))));
                        return;
                    }else{
                        $id = $this->Code->getCodeByCode($code, 'id');
                        $point = $this->Code->getCodeByCode($code, 'point');
                        $use = $this->Code->getCodeByCode($code, 'use');
                        if($use == 1){
                            $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('CCADEAU__ALREADY_USE'))));
                            return;
                        }else{
                            $this->Code->read(null, $id);
                            $this->Code->set(array(
                                'use' => '1'
                            ));
                            $this->Code->save();
                            $rs = $this->User->getKey('money') + $point;
                            $this->User->setToUser('money', $rs, $this->User->getKey('id'));
                            $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('CCADEAU__SUCCESS_CLAIM_1')." ".$point." ".$this->Lang->get('CCADEAU__SUCCESS_CLAIM_2'))));
                            return;
                        }
                    }
                }
            }
        }
        else
          throw new ForbiddenException();
    }

    public function admin_delete_code()
    {
        $this->layout = 'admin';
        $this->autoRender = false;
        if($this->isConnected && $this->User->isAdmin()){
            if(!empty($this->request->data)){
                if(!empty($this->request->data['id_cadeau_delete']))
                {
                    $this->loadModel('CodeCadeau.Code');
                    $this->Code->delete($this->request->data['id_cadeau_delete']);
                    $this->response->body(json_encode(array('statut' => true, 'msg' => "Supprimé !")));
                    return;
                }
            }
        }
        else
          throw new ForbiddenException();
    }

}
