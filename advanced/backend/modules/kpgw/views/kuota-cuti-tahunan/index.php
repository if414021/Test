<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\kpgw\models\search\KuotaCutiTahunanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kuota Cuti Tahunans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kuota-cuti-tahunan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kuota Cuti Tahunan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kuota_cuti_tahunan_id',
            'lama_bekerja_min',
            'lama_bekerja_max',
            'kuota',
            'satuan',
            // 'deleted',
            // 'deleted_at',
            // 'deleted_by',
            // 'updated_at',
            // 'updated_by',
            // 'created_at',
            // 'created_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
