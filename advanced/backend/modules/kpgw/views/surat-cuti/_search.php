<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\search\SuratCutiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-cuti-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'surat_cuti_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'kategori_surat_cuti_id') ?>

    <?= $form->field($model, 'tanggal_berangkat') ?>

    <?= $form->field($model, 'tanggal_kembali') ?>

    <?php // echo $form->field($model, 'alasan') ?>

    <?php // echo $form->field($model, 'pengalihan_tugas') ?>

    <?php // echo $form->field($model, 'status_approvingAtasan') ?>

    <?php // echo $form->field($model, 'status_approvingWR') ?>

    <?php // echo $form->field($model, 'status_broadcast') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <?php // echo $form->field($model, 'deleted_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
