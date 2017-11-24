<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\kpgw\models\search\TransportasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transportasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transportasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> &nbsp;</span> Tambahkan Transportasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'transportasi_id',
            'desc',
            [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Action',
                            'template' => '{view}',
                            'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                'title' => Yii::t('yii', 'View'),
                                                'class' => 'btn btn-warning',
                                    ]);
                                },],
                                    'urlCreator' => function ($action, $model, $key, $index) {
                                if ($action === 'view') {
                                    $url = Url::toRoute(['/kpgw/transportasi/transportasi-view', 'id' => $model->transportasi_id]);
                                    return $url;
                                }
                            }
                                ],
            // 'deleted',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'deleted_at',
            // 'deleted_by',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
