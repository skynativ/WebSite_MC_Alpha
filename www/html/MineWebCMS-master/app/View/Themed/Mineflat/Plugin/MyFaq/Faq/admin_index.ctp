<section class="content">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $Lang->get("FAQ"); ?></h3>
            </div>
            <div class="box-body">
                <div id="error_msg"></div>
                <button type="button" class="btn btn-large btn-block btn-success" onclick="FAQ.addFaq()">
                    <?= $Lang->get("ADD_FAQ") ?>
                </button>
                <hr>
                <table class="table table-hover" id="faq_list">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?= $Lang->get('QUESTION') ?></th>
                        <th><?= $Lang->get('ANSWER') ?></th>
                        <th><?= $Lang->get('GLOBAL__ACTIONS') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($faqs as $v): $v = current($v);?>
                        <tr id="faq-<?= $v['id'] ?>">
                            <th id="faq-<?= $v['id'] ?>-id"><?= $v['id'] ?></th>
                            <td id="faq-<?= $v['id'] ?>-question"><?= $v['question'] ?></td>
                            <td id="faq-<?= $v['id'] ?>-answer"><?= $v['answer'] ?></td>
                            <td>
                                <a href="#" onclick="FAQ.editFaq(<?= $v['id'] ?>);" class="btn btn-info"><?= $Lang->get('GLOBAL__EDIT') ?></a>
                                <a href="#" onclick="FAQ.removeFaq(<?= $v['id'] ?>);" class="btn btn-danger"><?= $Lang->get('GLOBAL__DELETE') ?></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>

<!-- FAQ Form Modal -->
<div class="modal fade" id="faq_modal" tabindex="-1" role="dialog" aria-labelledby="faq_modal_label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="add_faq_modal_label"><?= $Lang->get("ADD_FAQ") ?></h4>
            </div>
            <form id="faq_form" action="">
                <div class="modal-body">
                    <div id="modal_alert_msg"></div>
                    <input type="hidden" name="action" id="action">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="question"><?= $Lang->get("QUESTION") ?></label>
                        <input type="text" class="form-control" id="question" name="question" placeholder="<?= $Lang->get("QUESTION_PLACEHOLDER") ?>">
                    </div>
                    <div class="form-group">
                        <label for="answer"><?= $Lang->get("ANSWER") ?></label>
                        <textarea class="form-control" name="answer" id="answer" placeholder="<?= $Lang->get("ANSWER_PLACEHOLDER") ?>"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= $Lang->get("GLOBAL__CLOSE") ?></button>
                    <button type="submit" class="btn btn-primary"><?= $Lang->get("GLOBAL__SUBMIT") ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var FAQ = {};
    FAQ.editFaq = function(id){
      data = {};
      data["data[_Token][key]"] = '<?= $csrfToken ?>';
        $.ajax({
            method: "POST",
            data: data,
            url: "<?= $this->Html->url(array('controller' => 'faq', 'admin' => false, 'action' => 'ajax_get_faq')) ?>/" + id
        })
            .done(function(data) {
                if(typeof data == "object"){
                    $('#faq_modal').modal('show');
                    $('#faq_form #action').val("edit");
                    $('#faq_form #id').val(data.id);
                    $('#faq_form #question').val(data.question);
                    $('#faq_form #answer').val(data.answer);
                }
                else if(data == 0)
                    $('#error_msg').html('' +
                        '<div class="alert alert-error">' +
                        '<?= $Lang->get("FAQ_LOAD_ERROR") ?>' +
                        '</div>'
                    );

            })
            .fail(function() {
                $('#error_msg').html('' +
                    '<div class="alert alert-error">' +
                    '<?= $Lang->get("FAQ_LOAD_ERROR") ?>' +
                    '</div>'
                );
            })
            .always(function() {
            });
    };
    FAQ.removeFaq = function(id){
        if(confirm("<?= $Lang->get("FAQ_CONFIRM_REMOVING") ?>")){
          data = {};
          data['id'] = id;
          data["data[_Token][key]"] = '<?= $csrfToken ?>';
            $.ajax({
                method: "POST",
                url: "<?= $this->Html->url(array('controller' => 'faq', 'action' => 'ajax_remove_faq')) ?>",
                data: data
            })
                .done(function(data) {
                    if(data == 0){
                        $('#error_msg').html('' +
                            '<div class="alert alert-success">' +
                            '<?= $Lang->get("FAQ_SUCCESSFULY_REMOVED") ?>' +
                            '</div>'
                        );
                        $('#faq-' + id).remove();
                    }
                    else
                        $('#error_msg').html('' +
                            '<div class="alert alert-error">' +
                            '<?= $Lang->get("FAQ_REMOVING_ERROR") ?>' +
                            '</div>'
                        );

                })
                .fail(function() {
                    $('#error_msg').html('' +
                        '<div class="alert alert-error">' +
                        '<?= $Lang->get("FAQ_REMOVING_ERROR") ?>' +
                        '</div>'
                    );
                })
                .always(function() {
                });
        }
    };
    FAQ.addFaq = function(){
        $('#faq_form #action').val("add");
        $('#faq_modal').modal("show");
    }
    FAQ.submitForm = function(event){
        event.preventDefault();
        event.stopPropagation();

        var inputs = {
            action: $('#faq_form #action').val(),
            id: $('#faq_form #id').val(),
            question: $('#faq_form #question').val(),
            answer: $('#faq_form #answer').val()
        };
        inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
        $.ajax({
            method: "POST",
            url: "<?= $this->Html->url(array('controller' => 'faq', 'action' => 'ajax_save_faq')) ?>",
            data: inputs
        })
            .done(function(data) {
                console.log(data);
                if(typeof data == "object"){
                    console.log(data);
                    $('#error_msg').html('' +
                        '<div class="alert alert-success">' +
                        '<?= $Lang->get("FAQ_SUCCESSFULY_EDITED") ?>' +
                        '</div>'
                    );
                    if(data.action == "add")
                        $("#faq_list tbody").append(
                            "<tr id=\"faq-" + data.id + "\">" +
                            "<th id=\"faq-" + data.id + "-id\">" + data.id + "</th>" +
                            "<td id=\"faq-" + data.id + "-question\">" + data.question + "</td>" +
                            "<td id=\"faq-" + data.id + "-answer\">" + data.answer + "</td>" +
                            "<td>" +
                            "<a href=\"#\" onclick=\"FAQ.editFaq(" + data.id + ");\" class=\"btn btn-info\"><?= $Lang->get('EDIT') ?></a>" +
                            "<a href=\"#\" onclick=\"FAQ.removeFaq(" + data.id + ");\" class=\"btn btn-danger\"><?= $Lang->get('DELETE') ?></a>" +
                            "</td>"+
                            "</tr>"
                        );
                    else{
                        $('#faq-' + data.id + "-id").text(data.id);
                        $('#faq-' + data.id + "-question").text(data.question);
                        $('#faq-' + data.id + "-answer").text(data.answer);
                    }
                    $('#faq_modal').modal("hide");
                }
                else if(data == 0)
                    $('#modal_alert_msg').html('' +
                        '<div class="alert alert-error">' +
                        '<?= $Lang->get("FAQ_ERROR") ?>' +
                        '</div>'
                    );

            })
            .fail(function() {
                $('#modal_alert_msg').html('' +
                    '<div class="alert alert-error">' +
                    '<?= $Lang->get("FAQ_ERROR") ?>' +
                    '</div>'
                );
            })
            .always(function() {
            });
    };

    $('#faq_form').submit(FAQ.submitForm);
    $('#faq_modal').on('hide.bs.modal', function(event){
        $("#faq_form :input").each(function(){
            var input = $(this);
            input.val("");
        });
    });

</script>
