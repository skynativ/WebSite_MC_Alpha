<br />
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <div class="thumbnail text-center" style="padding:15px">
                <form method="post" data-redirect-url="?" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_login')) ?>">
                    <input type="hidden" name="data[_Token][key]" value="<?= $csrfToken ?>" />
                    <h1 style="margin-bottom:30px"><?= $Lang->get('USER__LOGIN') ?></h1>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <input class="form-control" name="pseudo" placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>" type="text" autofocus />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input class="form-control" name="password" placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>" type="password" autofocus />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <input type="checkbox" name="remember_me">
                            <?= $Lang->get('USER__REMEMBER_ME') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="<?= $Lang->get('USER__LOGIN') ?>" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>