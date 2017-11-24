<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sist\models\search\SistRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Semua Surat Tugas';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
if (Yii::$app->session->hasFlash('success')) {
    echo "<div class='alert-success'>" . Yii::$app->session->getFlash('success') . "</div>";
} else {
    echo "<div class='alert-warning'>" . Yii::$app->session->getFlash('error') . "</div>";
}
?>
<div class="surat-tugas-index">

    <h1>Daftar Cetak dan Broadcast Surat Tugas</h1>
    <br>


    <?php
    echo TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,
        'items' => [
            [
                'label' => 'Approved',
                'content' => GridView::widget([
                    'dataProvider' => $dataProvider4,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'kategori_surat_tugas_id',
                            'value' => 'kategoriSuratTugas.desc'
                        ],
                        [
                            'attribute' => 'user_id',
                            'value' => 'userpegawai.nama'
                        ],
                        'alasan_tugas',
                        'status_approvingHRD',
                        'status_approvingWR',
                        [
                            'header' => 'Action',
                            'format' => 'raw',
                            'value' => function($model, $key, $index) {
                                return Html::a('Print', ['surat-tugas/surat-tugas-report', 'id' => $model->surat_tugas_id], ['class' => 'btn btn-primary']);
                            },
                                ],
                                [
                                    'header' => 'Action',
                                    'format' => 'raw',
                                    'value' => function($model, $key, $index) {

                                        return Html::a('Broadcast', ['surat-tugas/sendmail', 'id' => $model->surat_tugas_id], ['class' => 'btn btn-warning']);
                                    },
                                        ],
                                    ],
                                ]),
                                'active' => true,
                                'headerOptions' => ['style' => 'font-weight:bold'],
                                'options' => ['id' => 'hrd'],
                            ],
                    ]]);
                    ?>
</div>