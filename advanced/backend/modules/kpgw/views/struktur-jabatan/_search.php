<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\search\StrukturJabatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="struktur-jabatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'struktur_jabatan_id') ?>

    <?= $form->field($model, 'instansi_id') ?>

    <?= $form->field($model, 'jabatan') ?>

    <?= $form->field($model, 'parent') ?>

    <?= $form->field($model, 'inisial') ?>

    <?php // echo $form->field($model, 'is_multi_tenant') ?>

    <?php // echo $form->field($model, 'is_unit') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <?php // echo $form->field($model, 'deleted_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
