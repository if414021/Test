<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\modules\kpgw\models\Pegawai;
/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\Signer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="signer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->
    <?=
        $form->field($model, 'user_id')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(Pegawai::find()->all(), 'user_id', 'nama'),
            'language' => 'en',
            'options' => ['placeholder' => 'Pilih nama Pegawai yang bertugas'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

        ?>

<!--     <?= $form->field($model, 'deleted')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'deleted_by')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
