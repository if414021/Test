<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\Signer */

$this->title = 'Update Signer: ' . $model->signer_id;
$this->params['breadcrumbs'][] = ['label' => 'Signers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->signer_id, 'url' => ['view', 'id' => $model->signer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="signer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
