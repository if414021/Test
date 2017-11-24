<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\StrukturJabatan */

$this->title = $model->struktur_jabatan_id;
$this->params['breadcrumbs'][] = ['label' => 'Struktur Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="struktur-jabatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['struktur-jabatan-edit', 'id' => $model->struktur_jabatan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['struktur-jabatan-del', 'id' => $model->struktur_jabatan_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'struktur_jabatan_id',
            'jabatan',
        ],
    ]) ?>

</div>
