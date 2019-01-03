<div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">Support</div>
    <div class="panel-body">
      <h4 class="text-center lato"><i class="fa fa-comments-o"></i> Vous avez besoin d’aide ? Alors n’hésitez pas !</h4>
      <button data-toggle="modal" data-target="#<?php if($isConnected AND $Permissions->can('POST_TICKET')) { echo 'post_ticket'; } else { echo 'login'; } ?>" class="btn-blue-small center-block button">Poster un ticket</button>
      <hr>
      <div id="content-tickets" class="support">
        <?php if(!empty($tickets)) { ?>
          <?php foreach ($tickets as $key => $value) { ?>
            <?php if($value['Ticket']['private'] == 0 OR $isConnected AND $user['isAdmin'] OR $isConnected AND $user['pseudo'] == $value['Ticket']['author'] OR $Permissions->can('VIEW_ALL_TICKETS')) { ?>
              <!-- Un ticket -->
              <div class="col-md-12" id="full-ticket-<?= $value['Ticket']['id'] ?>">
                <div class="panel panel-default panel-ticket">
                  <div class="support-content">
                    <span>
                    <?php if($value['Ticket']['state'] == 1) { echo '<icon style="color: green;" class="fa fa-check" title="'.$Lang->get('RESOLVED').'"></icon>'; } else { echo '<div style="display:inline-block;" id="ticket-state-'.$value['Ticket']['id'].'"><icon class="fa fa-times" style="color:red;" title="'.$Lang->get('UNRESOLVED').'"></icon></div>'; } ?>
                    <b><?= $value['Ticket']['title'] ?></b> de 
                    <u><?= $value['Ticket']['author'] ?></u>
                    </span>
                    <span class="pull-right">
                    <?php if($isConnected AND $user['isAdmin'] OR $isConnected AND $user['pseudo'] == $value['Ticket']['author'] AND $Permissions->can('DELETE_HIS_TICKET') OR $Permissions->can('DELETE_ALL_TICKETS')) { ?>
                    <a id="<?= $value['Ticket']['id'] ?>" title="<?= $Lang->get('GLOBAL__DELETE') ?>" class="ticket-delete btn btn-sm button-red"><icon class="fa fa-times"></icon></a>
                    <?php } ?>
                    <?php if($value['Ticket']['state'] == 0) { ?>
                      <?php if($isConnected AND $user['isAdmin'] OR $isConnected AND $user['pseudo'] == $value['Ticket']['author'] AND $Permissions->can('RESOLVE_HIS_TICKET') OR $Permissions->can('RESOLVE_ALL_TICKETS')) { ?>
                      <a id="<?= $value['Ticket']['id'] ?>" title="<?= $Lang->get('RESOLVED') ?>" class="ticket-resolved btn btn-sm button-green div-ticket-resolved-<?= $value['Ticket']['id'] ?>"><icon style="font-size: 10px;" class="fa fa-check"></icon></a>
                      <?php } ?>
                    <?php } ?>
                    <?php if($Permissions->can('SHOW_TICKETS_ANWSERS')) { ?>
                        <button id="<?= $value['Ticket']['id'] ?>" title="<?= $Lang->get('SHOW_ANSWER') ?>" class="btn btn-info btn-sm button-blue dropdown_reply"><icon style="font-size: 10px;" class="fa fa-chevron-down"></icon></button>
                      <?php } ?>
                      <?php if($value['Ticket']['state'] == 0 AND $isConnected AND $user['isAdmin'] OR $isConnected AND $user['pseudo'] == $value['Ticket']['author'] AND $value['Ticket']['state'] == 0 AND $Permissions->can('REPLY_TO_HIS_TICKETS') OR $Permissions->can('REPLY_TO_ALL_TICKETS')) { ?>
                      <button id="<?= $value['Ticket']['id'] ?>" title="<?= $Lang->get('REPLY') ?>" class="btn btn-warning btn-sm button-orange ticket-reply"><icon class="fa fa-mail-reply" style="font-size: 10px;"></icon></button>
                    <?php } ?>
                    </span>
                  </div>
                  <div class="panel-body">
                    <div id="ticket-<?= $value['Ticket']['id'] ?>"><?= ($value['Ticket']['content']) ?></div>
                    <div class="reply reply_<?= $value['Ticket']['id'] ?>">
                      <!-- Une réponse -->
                      <hr>
                      <?php if($Permissions->can('SHOW_TICKETS_ANWSERS') && !empty($reply_tickets)) { ?>
                        <h3>Réponses</h3>
                        <?php foreach ($reply_tickets as $k => $v) { ?>
                          <?php if($v['ReplyTicket']['ticket_id'] == $value['Ticket']['id']) { ?>
                          <div id="ticket-reply-<?= $v['ReplyTicket']['id'] ?>">
                            <div class="reply-col">
                              <blockquote>
                                  <img style="margin: 0 10px 5px 0;" class="support" src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/', 'plugin' => false)) ?>/<?= $v['ReplyTicket']['author']; ?>/32" title="<?= $v['ReplyTicket']['author']; ?>">
                                  <?php if($isConnected AND $user['isAdmin']) { ?>
                                  <div class="pull-right">
                                    <p><button id="<?= $v['ReplyTicket']['id'] ?>" title="<?= $Lang->get('GLOBAL__DELETE') ?>" class="button-red button reply-delete" style="font-size:12px;"><icon class="fa fa-times"></icon></button></p>
                                </div>
                                <?php } ?>
                                  <p class="support" style="font-size:13px"><?= before_display($v['ReplyTicket']['reply']); ?></p>
                                </blockquote>
                            </div>
                          </div>
                          <?php } ?>
                        <?php } ?>
                      <?php }?>
                      <!-- - - - - -->
                    </div>

                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="col-md-4">
  <div class="panel panel-default">
    <div class="panel-heading"><?= $Lang->get('STATS__TITLE') ?></div>
    <div class="panel-body">
          <p><?= $Lang->get('NUMBER_OF_TICKETS') ?> : </b><span id="nbr-ticket"><?= $nbr_tickets ?></p>
          <p><?= $Lang->get('NUMBER_OF_RESOLVED') ?> : </b><span id="nbr-ticket-resolved"><?= $nbr_tickets_resolved ?></p>
          <p><?= $Lang->get('NUMBER_OF_UNRESOLVED') ?> : </b><span id="nbr-ticket-unresolved"><?= $nbr_tickets_unresolved ?></p>
    </div>
  </div>
</div>
<?= $this->element('sidebar') ?>

<!-- Modals -->
<div class="modal fade" id="post_ticket" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span><span class="sr-only"><?= $Lang->get('GLOBAL__CLOSE') ?></span></button>
        <h4 class="modal-title lato"><?= $Lang->get('POST_A_TICKET') ?></h4>
      </div>
      <div class="modal-body">
      	<form action="<?= $this->Html->url(array('action' => 'ajax_post')) ?>" class="form-horizontal" data-ajax="true" data-callback-function="afterPostTicket" data-success-msg="false">

  			  <div class="form-group">
  			    <label for="inputEmail3" class="col-sm-2 control-label"><?= $Lang->get('GLOBAL__TITLE') ?></label>
  			    <div class="col-sm-10">
  			      <input type="text" name="title" class="form-control">
  			    </div>
  			  </div>

  			  <div class="form-group">
  			    <label for="inputPassword3" class="col-sm-2 control-label"><?= $Lang->get('PROBLEM') ?></label>
  			    <div class="col-sm-10">
  			      <textarea name="content" class="form-control" rows="3"></textarea>
  			    </div>
  			  </div>

  			  <div class="checkbox">
  			    <label>
  			      <input id="private" name="private" type="checkbox"> <?= $Lang->get('PRIVATE_TICKET') ?>
  			    </label>
  			  </div>
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn-blue-small button"><?= $Lang->get('GLOBAL__CLOSE') ?></button>
          <button type="submit" class="btn-green-small button"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="reply_ticket" tabindex="-1" role="dialog" aria-labelledby="reply_ticketLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?= $Lang->get('GLOBAL__CLOSE') ?></span></button>
        <h4 class="modal-title lato" id="myModalLabel"><?= $Lang->get('REPLY_TO_TICKET') ?></h4>
      </div>
      <div class="modal-body">
      	<div class="ticket-reply">Javascript désactiver ?</div>
        <hr>
      	<form action="<?= $this->Html->url(array('action' => 'ajax_reply')) ?>" class="form-horizontal" data-ajax="true" data-callback-function="afterReplyTicket" data-success-msg="false">
      		<input id="id_reply_form" type="hidden" name="id" value="ID">
      		<textarea name="reply" class="form-control" rows="3" placeholder="<?= $Lang->get('YOUR_REPLY') ?>"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn-blue-small button"><?= $Lang->get('GLOBAL__CLOSE') ?></button>
        <button type="submit" class="btn-green-small button"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
       </form>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script type="text/javascript">
  function afterPostTicket(request, response) {

    $('#post_ticket').modal('hide');

    var ticket = '<div class="col-md-12">';
      ticket += '<div class="panel panel-default panel-ticket">';
        ticket += '<div class="panel-heading"><img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/', 'plugin' => false)) ?>/<?= $user['pseudo'] ?>/26" title="<?= $user['pseudo'] ?>"> <?= $user['pseudo'] ?></div>';
        ticket += '<div class="panel-body">';
          ticket += '<h3>';
            ticket += request.title;
            ticket += '&nbsp;<div style="display:inline-block;" id="ticket-state-'+response.id+'">';
              ticket += '<icon class="fa fa-times" style="color:red;" title="<?= $Lang->get('UNRESOLVED') ?>"></icon>';
            ticket += '</div>';
          ticket += '</h3>';
          ticket += '<p id="'+request.id+'">'+request.content+'</p>';
        ticket += '</div>';
      ticket += '</div>';
    ticket += '</div>';
    console.log(ticket);
    $("#content-tickets").prepend(ticket);

    var nbr_ticket = $('#nbr-ticket').html();
    nbr_ticket = parseInt(nbr_ticket);
    nbr_ticket = nbr_ticket + 1;
    $('#nbr-ticket').html(nbr_ticket);

    var nbr_ticket_unresolved = $('#nbr-ticket-unresolved').html();
    nbr_ticket_unresolved = parseInt(nbr_ticket_unresolved);
    nbr_ticket_unresolved = nbr_ticket_unresolved + 1;
    $('#nbr-ticket-unresolved').html(nbr_ticket_unresolved);

  }

  function afterReplyTicket(request, response) {

    $('#reply_ticket').modal('hide');
    /**
    * Dropdown reply
    **/
    $(".reply_"+request.id).slideToggle("slow");
    if($('.dropdown_reply #'+request.id).attr('class') == 'btn btn-info btn-sm dropdown_reply active') {
        $('.dropdown_reply #'+request.id).empty().html('<icon style="font-size: 10px;" class="fa fa-chevron-down"></icon>');
    } else {
        $('.dropdown_reply #'+request.id).empty().html('<icon style="font-size: 10px;" class="fa fa-chevron-up"></icon>');
    }
    $('.dropdown_reply #'+request.id).toggleClass('active');
    /**
    * end dropdown
    **/
    $('.reply.reply_'+request.id).append('<div class="reply-col"><blockquote><img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false)) ?>/<?= $user['pseudo']; ?>/32" title="<?= $user['pseudo']; ?>">'+request.reply+'</blockquote></div>').slideDown(1000);
  }

  $(".ticket-delete").click(function() {

    var inputs = {};
    var id = inputs["id"] = $(this).attr("id");
    inputs["data[_Token][key]"] = '<?= $csrfToken ?>';

    $.post("<?= $this->Html->url(array('action' => 'ajax_delete')) ?>", inputs, function(data) {

      if(data == 'true') {

        $('#full-ticket-'+id).slideUp(1500); // je le supprime sur la page

        // Calcul pour le changement en temps réél des stats
          var nbr_ticket = $('#nbr-ticket').html();
          nbr_ticket = parseInt(nbr_ticket);
          nbr_ticket = nbr_ticket - 1;
          $('#nbr-ticket').html(nbr_ticket);

        if($('#ticket-state-'+id).html() == '<icon style="color: green;" class="fa fa-check" title="<?= $Lang->get('RESOLVED') ?>"></icon>') {
          var nbr_ticket_resolved = $('#nbr-ticket-resolved').html();
          nbr_ticket_resolved = parseInt(nbr_ticket_resolved);
          nbr_ticket_resolved = nbr_ticket_resolved - 1;
          $('#nbr-ticket-resolved').html(nbr_ticket_resolved);
        } else {
          var nbr_ticket_unresolved = $('#nbr-ticket-unresolved').html();
          nbr_ticket_unresolved = parseInt(nbr_ticket_unresolved);
          nbr_ticket_unresolved = nbr_ticket_unresolved - 1;
          $('#nbr-ticket-unresolved').html(nbr_ticket_unresolved);
        }

      } else {
        console.log(data);
        alert('Error!');
      }
    });
  });

  $(".dropdown_reply").click(function() {
    var id = $(this).attr("id");
    $(".reply_"+id).slideToggle("slow");
    if($(this).attr('class') == 'btn btn-info btn-sm dropdown_reply active') {
      $(this).empty().html('<icon style="font-size: 10px;" class="fa fa-chevron-down"></icon>');
    } else {
      $(this).empty().html('<icon style="font-size: 10px;" class="fa fa-chevron-up"></icon>');
    }
    $(this).toggleClass('active');
  });

  $(".ticket-resolved").click(function() {

    var inputs = {};
    var id = inputs["id"] = $(this).attr("id");
    inputs["data[_Token][key]"] = '<?= $csrfToken ?>';

    $.post("<?= $this->Html->url(array('action' => 'ajax_resolved')) ?>", inputs, function(data) {
      if(data == 'true') {
        $('#ticket-state-'+id).html('<icon style="color: green;" class="fa fa-check" title="<?= $Lang->get('RESOLVED') ?>"></icon>'); // je le passe en résolu sur la page
        // changement des stats en temps réél
        var nbr_ticket_resolved = $('#nbr-ticket-resolved').html();
        nbr_ticket_resolved = parseInt(nbr_ticket_resolved);
        nbr_ticket_resolved = nbr_ticket_resolved + 1;
        $('#nbr-ticket-resolved').html(nbr_ticket_resolved);
        var nbr_ticket_unresolved = $('#nbr-ticket-unresolved').html();
        nbr_ticket_unresolved = parseInt(nbr_ticket_unresolved);
        nbr_ticket_unresolved = nbr_ticket_unresolved - 1;
        $('#nbr-ticket-unresolved').html(nbr_ticket_unresolved);
        $('.div-ticket-resolved-'+id).remove();
        $('.ticket-reply #'+id).remove();
        // Fin des stats
      } else {
        console.log(data);
        alert('Error!');
      }
    });

  });

  $(".ticket-reply").click(function() {
    var id = $(this).attr("id");
    $('#reply_ticket').modal('toggle');
    var content = $('#ticket-'+id).html();
    $('.modal-body .ticket-reply').html(content);
    $('#reply_ticket .pull-right.support').remove();
    $('#reply_ticket .reply_'+id).remove();
    $('#id_reply_form').val(id);
  });

  $(".reply-delete").click(function() {

    var inputs = {};
    var id = inputs["id"] = $(this).attr("id");
    inputs["data[_Token][key]"] = '<?= $csrfToken ?>';

    $.post("<?= $this->Html->url(array('action' => 'ajax_reply_delete')) ?>", inputs, function(data) {
      if(data == 'true') {
        $('#ticket-reply-'+id).slideUp(1500);
      } else {
        alert('Error!');
        console.log(data);
      }
    });
  });
</script>
