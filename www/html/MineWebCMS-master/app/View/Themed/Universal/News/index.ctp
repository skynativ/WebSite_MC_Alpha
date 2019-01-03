<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1><?= $news['News']['title'] ?></h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb">
          <li><a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a></li>
          <li><a href="#">Blog</a></li>
          <li><?= $news['News']['title'] ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <section>
    <div class="container">
      <div class="row">

        <div class="col-md-9" id="blog-post">

          <p class="text-muted text-uppercase mb-small text-right"><?= $Lang->get('GLOBAL__BY') ?> <a href="#"><?= $news['News']['author'] ?></a> | <?= $Lang->get('NEWS__POSTED_ON') . ' ' . $Lang->date($news['News']['created']); ?></p>

          <div id="post-content">
            <?= $news['News']['content'] ?>
          </div>


          <button id="<?= $news['News']['id'] ?>" type="button" class="btn btn-template-main pull-right like<?= ($news['News']['liked']) ? ' active' : '' ?>"<?= (!$Permissions->can('LIKE_NEWS')) ? ' disabled' : '' ?>><?= $news['News']['count_likes'] ?> <i class="fa fa-thumbs-up"></i></button><br>

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
                      echo '<img src="'.$this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', $comment['author'], '150')).'" class="img-responsive img-circle" alt="">';
                    echo '</p>';
                  echo '</div>';
                  echo '<div class="col-sm-9 col-md-10">';
                    echo '<h5 class="text-uppercase">'.$comment['author'].'</h5>';
                    echo '<p class="posted"><i class="fa fa-clock-o"></i> '.$Lang->date($comment['created']).'</p>';
                    echo '<p>'.before_display($comment['content']).'</p>';
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
                    <button type="submit" class="btn btn-template-main"><i class="fa fa-comment-o"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
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
