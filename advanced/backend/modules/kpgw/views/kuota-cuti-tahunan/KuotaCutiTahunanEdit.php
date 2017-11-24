<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\KuotaCutiTahunan */

$this->title = 'Update Kuota Cuti Tahunan: ' . $model->kuota_cuti_tahunan_id;
$this->params['breadcrumbs'][] = ['label' => 'Kuota Cuti Tahunans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kuota_cuti_tahunan_id, 'url' => ['view', 'id' => $model->kuota_cuti_tahunan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kuota-cuti-tahunan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
