<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\Transportasi */

$this->title = 'Update Transportasi: ' . $model->transportasi_id;
$this->params['breadcrumbs'][] = ['label' => 'Transportasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->transportasi_id, 'url' => ['view', 'id' => $model->transportasi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transportasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
