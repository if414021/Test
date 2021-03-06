<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\kpgw\models\Pegawai;
/* @var $this yii\web\View */
/* @var $model backend\modules\sist\models\SistRUser */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sist-ruser-view col-lg-9">
    <table width="100%">
        <td width="90%"> <h1><?= Html::encode($this->title) ?></h1></td>
        <td width="5%"><?= Html::a('Edit', ['pegawai-edit', 'id' => $model->pegawai_id], ['class' => 'btn btn-primary']) ?> </td>
        <td width="5%">
            <?= Html::a('Delete', ['pegawai-del', 'id' => $model->pegawai_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        </td>
    
    </table>
    <br>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
            array(
                'label' => $model->strukturJabatan->getAttributeLabel('Jabatan'),
                'value' => $model->strukturJabatan->jabatan
            ),
            'nip',
            array(
                'label' => $model->role->getAttributeLabel('Role'),
                'value' => $model->role->desc
            ),
            'kuota_cuti_tahunan',
            'email:email',
        ],
    ])
    ?>

</div>
