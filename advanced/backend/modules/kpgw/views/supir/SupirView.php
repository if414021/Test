<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\Supir */

$this->title = $model->desc;
$this->params['breadcrumbs'][] = ['label' => 'Supirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supir-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['transportasi-edit', 'id' => $model->supir_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['transportasi-del', 'id' => $model->supir_id], [
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
            // 'supir_id',
            'desc',
            // 'deleted',
            // 'created_at',
            // 'created_by',
            // 'update_at',
            // 'updated_by',
            // 'deleted_at',
            // 'deleted_by',
        ],
    ]) ?>

</div>
