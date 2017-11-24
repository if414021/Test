<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\kpgw\models\search\SupirSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Supir';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supir-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> &nbsp;</span> Tambahkan Supir', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'supir_id',
            'desc',
            //'deleted',
            //'created_at',
            //'created_by',
            // 'update_at',
            // 'updated_by',
            // 'deleted_at',
            // 'deleted_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
