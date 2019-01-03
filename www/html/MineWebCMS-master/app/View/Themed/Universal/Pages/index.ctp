<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
          <h1><?= $page['title'] ?></h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb">
          <li><a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a></li>
          <li>Page</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <section>
          <div id="text-page">
            <article><?= $page['content'] ?></article>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
