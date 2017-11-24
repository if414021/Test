<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\Signer */

$this->title = $model->signer_id;
$this->params['breadcrumbs'][] = ['label' => 'Signers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['signer-edit', 'id' => $model->signer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['signer-del', 'id' => $model->signer_id], [
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
            // 'signer_id',
            'desc',
            array(
                'label' => $model->userpegawai->getAttributeLabel('Nama Pegawai'),
                'value' => $model->userpegawai->nama
            ),
            // 'user_id',
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
