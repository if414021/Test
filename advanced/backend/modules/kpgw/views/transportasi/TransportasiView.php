<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\Transportasi */

$this->title = $model->desc;
$this->params['breadcrumbs'][] = ['label' => 'Transportasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transportasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['transportasi-edit', 'id' => $model->transportasi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['transportasi-del', 'id' => $model->transportasi_id], [
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
            'transportasi_id',
            'desc',
            // 'deleted',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'deleted_at',
            // 'deleted_by',
        ],
    ]) ?>

</div>
