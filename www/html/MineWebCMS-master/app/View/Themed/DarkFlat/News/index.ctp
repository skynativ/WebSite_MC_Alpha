<div class="stats">
    <div class="container">
        <img src="<?= $theme_config['logo_site'] ?>" style="width: 200px" alt="Logo"><br>
	</div>
</div>
<div class="content">
        <div class="container">
			<h1><?= $news['News']['title'] ?></h1>
			<p><?= $Lang->get('GLOBAL__BY') ?> <b><?= $news['News']['author'] ?></b> | <?= $Lang->get('NEWS__POSTED_ON') . ' ' . $Lang->date($news['News']['created']); ?></p>
			<div class="product">
				<?= $news['News']['content'] ?>
				<br>
				<a class="link"><button id="<?= $news['News']['id'] ?>" type="button" class="btn btn-success btn-small like<?= ($news['News']['liked']) ? ' active' : '' ?>"<?= (!$Permissions->can('LIKE_NEWS')) ? ' disabled' : '' ?>><?= $news['News']['count_likes'] ?> <i class="fa fa-thumbs-up"></i></button></a>
			</div>
			<ul>
			<div id="comments">
            <h4 class="text-uppercase"><?= count($news['Comment']).' '.$Lang->get('NEWS__COMMENTS_TITLE') ?></h4>
            <div class="add-comment"></div>
            <?php
            $i = 0;
            $count = $news['Comment'];
            if($count > 0) {
              foreach ($news['Comment'] as $comment) {
                $i++;
                echo '<div class="row comment';
                  echo ($i == $count) ? ' last' : '';
                    echo '" id="comment-'.$comment['id'].'">';
                      echo '<div class="col-sm-3 col-md-2 text-center-xs">';
                        echo '<p>';
                          echo '<img src="'.$this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', $comment['author'], '120')).'" class="img-responsive img-circle" alt="">';
                          echo '</p>';
                        echo '</div>';
                      echo '<div class="col-lg-10 col-md-8">';
					  echo '<div class="box-content" id="container">';
					  echo '<div class="panel-body">';
						echo '<p>'.before_display($comment['content']).'</p>';
						echo '<hr style="margin: 5px;">';
					echo '<div class="text-right">';
					    echo '<label class="label label-success">'.$comment['author'].'</label> '; 
						echo '<label class="label label-info">'.$Lang->date($comment['created']).'</label>';
						if($Permissions->can('DELETE_COMMENT') OR $Permissions->can('DELETE_HIS_COMMENT') AND $user['pseudo'] == $v['author']) {
						echo '<label class="label label-danger"><a id="'.$comment['id'].'" class="comment-delete" href="#"><i class="fa fa-times"></i> '.$Lang->get('GLOBAL__DELETE').'</a></label>';
                    }
				  echo '</div>';
                  echo '</div>';
                echo '</div>';
				echo '</div>';
				echo '</div>';
              }
            }
            ?>
          </div>
          <?php if($Permissions->can('COMMENT_NEWS')) { ?>
            <div id="comment-form">
              <div id="form-comment-fade-out">
                <h4><?= $Lang->get('NEWS__COMMENT_TITLE') ?> :</h4>
                <form method="POST" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'news', 'action' => 'add_comment')) ?>" data-callback-function="addcomment" data-success-msg="false">
                  <input name="news_id" value="<?= $news['News']['id'] ?>" type="hidden">
                  <div class="form-group">
                      <textarea name="content" class="form-control" rows="3"></textarea>
                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn btn-success btn-small"><i class="fa fa-comment-o"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                  </div>
                </form>
              </div>
            </div>
          <?php } ?>
			</ul>
		</div>
</div>	

<?= $Module->loadModules('news') ?>
<script>
    function addcomment(data) {
        var d = new Date();
        var comment = '';
        comment += '<div class="row comment">';
          comment += '<div class="col-sm-3 col-md-2 text-center-xs">';
            comment += '<p>';
              comment += '<img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', $user['pseudo'], '150')) ?>" class="img-responsive img-circle" alt="">';
            comment += '</p>';
          comment += '</div>';
          comment += '<div class="col-sm-9 col-md-10">';
            comment += '<h5 class="text-uppercase"><?= $user['pseudo'] ?></h5>';
            comment += '<p class="posted"><i class="fa fa-clock-o"></i> '+d.getHours()+'h'+d.getMinutes()+'</p>';
            comment += '<p>'+data['content']+'</p>';
          comment += '</div>';
        comment += '</div>';
        $('.add-comment').hide().html(comment).fadeIn(1500);
        $('#form-comment-fade-out').slideUp(1500);
    }
     $(".comment-delete").click(function(e) {
       e.preventDefault();
        comment_delete(this);
    });

    function comment_delete(e) {
        var inputs = {};
        var id = $(e).attr("id");
        inputs["id"] = id;
        inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
        $.post("<?= $this->Html->url(array('controller' => 'news', 'action' => 'ajax_comment_delete')) ?>", inputs, function(data) {
          if(data == 'true') {
            $('#comment-'+id).slideUp(500);
          } else {
            console.log(data);
          }
        });
    }
</script>
