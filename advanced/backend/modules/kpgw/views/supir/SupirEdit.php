<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\Supir */

$this->title = 'Update Supir: ' . $model->supir_id;
$this->params['breadcrumbs'][] = ['label' => 'Supirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->supir_id, 'url' => ['view', 'id' => $model->supir_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supir-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
