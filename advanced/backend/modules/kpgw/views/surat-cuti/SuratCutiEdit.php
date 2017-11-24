<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\SuratCuti */

$this->title = 'Update Surat Cuti: ' . $model->surat_cuti_id;
$this->params['breadcrumbs'][] = ['label' => 'Surat Cutis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->surat_cuti_id, 'url' => ['view', 'id' => $model->surat_cuti_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="surat-cuti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
