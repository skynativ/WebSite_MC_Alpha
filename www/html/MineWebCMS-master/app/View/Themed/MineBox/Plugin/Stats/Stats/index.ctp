<?= $this->Html->css('Stats.stats') ?>
<br>
<?php
function translate($day) {
    $replaces = array(
        'Monday'=>'Lundi',
        'Tuesday'=>'Mardi',
        'Wednesday'=>'Mercredi',
        'Thursday'=>'Jeudi',
        'Saturday'=>'Samedi',
        'Sunday'=>'Dimanche',
        'Friday'=>'Vendredi'
    );


    return str_replace($day, $replaces[$day], $day);
}
?>

<div class="container theme-support">
    <div class="row">
        <div class="col-md-4 staff-container">
            <?php foreach ($staffs as $staff): ?>
                <div class="panel panel-<?= $staff['Staff']['color'] ?>">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $staff['Staff']['name'] ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php foreach ($staffResult as $s): ?>
                            <?php if($staff['Staff']['id'] == $s['StaffUser']['staff_id']): ?>
                                <div class="col-md-12 staff-box">
                                    <img width="40px;" src="<?= $this->Html->url('/API/get_head_skin/'.$s['StaffUser']['user_id']) ?>/40" class="">
                                    <div class="staff-description">
                                        <span class="username"><?= $s['StaffUser']['user_id'] ?></span>
                                        <span class="function"><?= $s['StaffUser']['function'] ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <?php if($staff['Staff']['description'] != ""): ?>
                        <div class="panel-footer">
                            <?= $staff['Staff']['description'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-8">
            <div class="col-md-12 stats-container">
                <div class="panel panel-stats">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $Lang->get('STATS__STATS_NUMBER') ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-4 stats-box">
                            <span class="name"><?= $Lang->get('STATS__STATS_REGISTER') ?></span>
                            <span class="value"><?= $count_register ?></span>
                        </div>
                        <div class="col-md-4 stats-box">
                            <span class="name"><?= $Lang->get('STATS__STATS_UNIQUE') ?></span>
                            <span class="value"><?= $uUsers ?></span>
                        </div>
                        <div class="col-md-4 stats-box">
                            <span class="name"><?= $Lang->get('STATS__STATS_VISITE') ?></span>
                            <span class="value"><?= $count_visits ?></span>
                        </div>
                        <div class="col-md-12 stats-seperator"></div>
                        <div class="col-md-4 stats-box">
                            <span class="name"><?= $Lang->get('STATS__STATS_NEWS') ?></span>
                            <span class="value"><?= $count_news ?></span>
                        </div>
                        <div class="col-md-4 stats-box">
                            <span class="name"><?= $Lang->get('STATS__STATS_COMMENT') ?></span>
                            <span class="value"><?= $count_comment ?></span>
                        </div>
                        <div class="col-md-4 stats-box">
                            <span class="name"><?= $Lang->get('STATS__STATS_LIKE') ?></span>
                            <span class="value"><?= $count_like ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 stats-container">
                <div class="panel panel-stats">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $Lang->get('STATS__STATS_SHOW') ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 stats-box">
                            <div id="inscriptions" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 stats-container">
                <div class="panel panel-stats">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $Lang->get('STATS__STATS_SHOW_VISITE') ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 stats-box">
                            <div id="visites" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('inscriptions', {
        chart: {
            type: 'column'
        },
        legend: {
            enabled: false
        },
        xAxis: {
            categories: [
                '<?= translate(date('l', strtotime('-6 day'))) ?>',
                '<?= translate(date('l', strtotime('-5 day'))) ?>',
                '<?= translate(date('l', strtotime('-4 day'))) ?>',
                '<?= translate(date('l', strtotime('-3 day'))) ?>',
                '<?= translate(date('l', strtotime('-2 day'))) ?>',
                '<?= translate(date('l', strtotime('-1 day'))) ?>',
                '<?= translate(date('l')) ?>'
            ],
            crosshair: true
        },
        yAxis: [{ //--- Primary yAxis
            title: {
                text: 'Inscriptions'
            }
        }],
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        tooltip: {
            backgroundColor: '#ececec',
            borderRadius: 0,
            borderWidth: 0,
            shadow: 0,
            formatter: function() {
                return this.y + ' inscriptions ' + this.x;
            }
        },
        series: [{
            name: '',
            color: '#2ecc71',
            data: [<?= $count_register6 ?>, <?= $count_register5 ?>, <?= $count_register4 ?>, <?= $count_register3 ?>, <?= $count_register2 ?>, <?= $count_register1 ?>, <?= $count_register0 ?>]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        enabled: false
                    }
                }
            }]
        }
    });

    Highcharts.chart('visites', {
        chart: {
            type: 'column'
        },
        legend: {
            enabled: false
        },
        xAxis: {
            categories: [
                '<?= translate(date('l', strtotime('-6 day'))) ?>',
                '<?= translate(date('l', strtotime('-5 day'))) ?>',
                '<?= translate(date('l', strtotime('-4 day'))) ?>',
                '<?= translate(date('l', strtotime('-3 day'))) ?>',
                '<?= translate(date('l', strtotime('-2 day'))) ?>',
                '<?= translate(date('l', strtotime('-1 day'))) ?>',
                '<?= translate(date('l')) ?>'
            ],
            crosshair: true
        },
        yAxis: [{ //--- Primary yAxis
            title: {
                text: 'Inscriptions'
            }
        }],
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        tooltip: {
            backgroundColor: '#ececec',
            borderRadius: 0,
            borderWidth: 0,
            shadow: 0,
            formatter: function() {
                return this.y + ' visites ' + this.x;
            }
        },
        series: [{
            name: '',
            color: '#f1c40f',
            data: [<?= $count_visits6 ?>, <?= $count_visits5 ?>, <?= $count_visits4 ?>, <?= $count_visits3 ?>, <?= $count_visits2 ?>, <?= $count_visits1 ?>, <?= $count_visits0 ?>]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        enabled: false
                    }
                }
            }]
        }
    });
</script>