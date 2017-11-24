<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\Pegawai */

$this->title = 'Update Pegawai: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pegawai_id, 'url' => ['view', 'id' => $model->pegawai_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
