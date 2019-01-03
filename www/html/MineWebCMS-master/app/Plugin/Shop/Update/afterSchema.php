<?php
/* ==================================================
  Fichier éxécuté après la comparaison des schema SQL
  Vous pouvez donc modifier des données ici (les nouvelles tables auront été crées)
  ==================================================
*/

  /* -------
      0.5.0
     -------
  */

    // Si la table 'shop__items_buy_histories' est vide
    $shop__points_transfer_histories = ClassRegistry::init('Shop.PointsTransferHistory');
    if($shop__points_transfer_histories->find('count') == 0) {
      // On parcours toutes les entrées de l'historique avec l'action SEND_MONEY
      $histories = ClassRegistry::init('History');
      $send_money = $histories->find('all', array('conditions' => array('action' => 'SEND_MONEY')));

      //
      $userModel = ClassRegistry::init('User');

      foreach ($send_money as $transfer) {

        $transfer = $transfer['History'];

        // On set les données
        $points = explode('|', $transfer['other'])[1];
        $user_name = explode('|', $transfer['other'])[0];
        $author_id = $transfer['user_id'];
        $created = $transfer['created'];

        // on cherche l'user_id en fonction du pseudo
        $user_id = $userModel->getFromUser('id', $user_name);

        // on le set
        $shop__points_transfer_histories->create();
        $shop__points_transfer_histories->set(array(
          'points' => $points,
          'user_id' => $user_id,
          'author_id' => $author_id,
          'created' => $created
        ));
        $shop__points_transfer_histories->save();

      }
    }
