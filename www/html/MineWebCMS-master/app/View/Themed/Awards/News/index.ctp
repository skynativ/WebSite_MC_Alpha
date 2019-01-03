<div class="news-page">
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="titlePage theme-color-text"><?= $news['News']['title'] ?></h1>
        </div>
    </div>
</div>
  <section>
    <div class="container">
      <div class="row">

        <div class="col-md-9 news-page" id="blog-post">
            
            <div class="panel panel-default">
              <div class="panel-body" style="margin:0;">
                

                  <p id="post-content" class="news-text">
                    <?= $news['News']['content'] ?>
                  </p>

                    <label class="news-date"><?= $Lang->get('GLOBAL__BY') ?> <a href="#"><?= $news['News']['author'] ?></a> | <?= $Lang->get('NEWS__POSTED_ON') . ' ' . $Lang->date($news['News']['created']); ?></label>

                  <br>
                  
                  <button id="<?= $news['News']['id'] ?>" type="button" class="btn btn-primary like<?= ($news['News']['liked']) ? ' active' : '' ?>"<?= (!$Permissions->can('LIKE_NEWS')) ? ' disabled' : '' ?>><?= $news['News']['count_likes'] ?> <i class="fa fa-thumbs-up"></i></button><br>
                  
              </div>
            </div>


          <div id="news-commentaires">           
              
              <div class="news-commentaires-title theme-color-background">
                <h1><?= count($news['Comment']).' '.$Lang->get('NEWS__COMMENTS_TITLE') ?></h1>
              </div>
              <br>

            <div class="news-commentaires-add"></div>
            <?php
            $i = 0;
            $count = $news['Comment'];
            if($count > 0) {

              foreach ($news['Comment'] as $comment) {
                $i++;

                echo '<div class="row comment';
                echo ($i == $count) ? ' last' : '';
                echo '" id="comment-'.$comment['id'].'" style="margin-right: 0px;margin-left: 0px;">';
                  echo '<div class="col-sm-3 col-md-2 text-center-xs">';
                    echo '<p>';
                      echo '<img src="'.$this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', $comment['author'], '150')).'" class="img-responsive img-rounded" alt="">';
                    echo '</p>';
                  echo '<h5 class="pseudo">'.$comment['author'].'</h5>';
                  echo '</div>';
                  echo '<div class="col-sm-9 col-md-10">';
                    echo '<p style="min-height:115px;">'.before_display($comment['content']).'</p>';
                  echo '<p class="posted pull-right"><i class="fa fa-clock-o"></i> '.$Lang->date($comment['created']).'</p>';
                    if($Permissions->can('DELETE_COMMENT') OR $Permissions->can('DELETE_HIS_COMMENT') AND $user['pseudo'] == $v['author']) {
                      echo '<p class="reply"><a id="'.$comment['id'].'" class="text-danger comment-delete" href="#"><i class="fa fa-times"></i> '.$Lang->get('GLOBAL__DELETE').'</a></p>';
                    }
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
                  <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-default"><i class="fa fa-comment-o"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                  </div>
                </form>
              </div>
            </div>
          <?php } ?>

        </div>

        <div class="col-md-3">

          <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
              <h3 class="panel-title"><?= $Lang->get('NEWS__LAST_TITLE') ?></h3>
            </div>

            <div class="panel-body">
              <ul class="nav nav-pills nav-stacked">
                <?php foreach ($search_news as $k => $v) { ?>
                  <li><a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>"><?= $v['News']['title'] ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
            comment += '<h5 class="pseudo"><?= $user['pseudo'] ?></h5>';
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
</div>