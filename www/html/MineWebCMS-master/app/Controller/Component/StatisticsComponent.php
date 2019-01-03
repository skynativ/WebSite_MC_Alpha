<?php

/**
* Composant des statistiques
* @author Eywek
* Avec l'aide de : http://openclassrooms.com/courses/des-statistiques-pour-votre-site
**/

/**
* BDD
*
* -- Table visits --
*
* ip
* created
* referer
* location
*
* -- Table rush_hours --
*
* created
* visits
*
* -- connected --
*
* ip
* created
* location
*
**/
App::uses('AppHelper', 'View/Helper');
App::uses('CakeSession', 'Model/Datasource');
class StatisticsComponent extends Object {

  function shutdown($controller) {
  }

  function beforeRender($controller) {
  }

  function beforeRedirect() {
  }

  function initialize($controller) {
  }

  function startup($controller) {
    $cookie = CakeSession::read('visit_check');
    if(!isset($cookie) OR empty($cookie)) {
      $this->Visit = ClassRegistry::init('Visit');
      $visits = $this->Visit->find('all', array('conditions' => array('ip' => $_SERVER["REMOTE_ADDR"], 'created LIKE' => date('Y-m-d').'%')));
      if(empty($visits)) {
        if(!empty($_SERVER['HTTP_REFERER'])) {
          $referer = $_SERVER['HTTP_REFERER'];
        } else {
          $referer = 'null';
        }
        $user_agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : 'null';
        $language = (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : 'null';
        $language = $language{0}.$language{1};
        $this->Visit->read(null, null);
        $this->Visit->set(array('ip' => $_SERVER["REMOTE_ADDR"], 'referer' => $referer, 'lang' => $language, 'navigator' => $user_agent, 'page' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
        $this->Visit->save();
      }
      CakeSession::write('visit_check', true, true, '1 day');
    }
  }

}
