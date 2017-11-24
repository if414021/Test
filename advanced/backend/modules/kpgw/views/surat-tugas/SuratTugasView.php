<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\sist\models\SistRequest */

$this->title = 'Detail Request Surat Tugas';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Semua Request', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="surat-tugas-view col-lg-9">
    
    <table width="100%">
        <td width="90%"> <h1><?= Html::encode($this->title) ?></h1></td>
        <td width="5%"><?= Html::a('Edit', ['surat-tugas-edit', 'id' => $model->surat_tugas_id], ['class' => 'btn btn-primary']) ?> </td>
        <td width="5%"><?=
            Html::a('Batalkan Request', ['surat-tugas-del', 'id' => $model->surat_tugas_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Anda yakin untuk membatalkan request ini?',
                    'method' => 'post',
                ],
            ])
            ?></td>
    </table>
    <br>
    <?php
    echo '<table class="table table-striped table-bordered detail-view"><tbody><tr ><th width=337px>Nama Dosen Pendamping </th><td>';
    if (!empty($model->dosen_pendamping)) {
        $implo = explode(",", $model->dosen_pendamping);

        $tampung = new \backend\modules\kpgw\models\Pegawai;
        $rowspan = sizeof($implo) + 1;

        for ($request = 0; $request < sizeof($implo); $request++) {
            $a = 1;
            $a++;

            $tampung = \backend\modules\kpgw\models\Pegawai::find()->where(['user_id' => $model->dosen_pendamping])->one();

            $arrey[$a] = $tampung->nama;
            $simpan[$request] = [
                'nama' => $tampung->nama
            ];
//            $arrey1($request)=$tampung->full_name;
//             $arrey2($request)=$request;
//        var_dump($tampung);
//        die();
            echo $arrey[$a] . '<br>';
//        $array[$request] = $tampung->full_name;
        }
    } else
        echo'<i>Tidak ada pendamping<i>';
    echo '</td></tr></tbody></table>';
//     die();
    //  $key=$request;
    ?>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            array(
                'label' => $model->userpegawai->getAttributeLabel('Dosen yang bertugas'),
                'value' => $model->userpegawai->nama
            ),
            array(
                'label' => $model->kategoriSuratTugas->getAttributeLabel('Deskripsi'),
                'value' => $model->kategoriSuratTugas->desc
            ),
            'alasan_tugas',
            'tujuan',
            'lokasi_inap',
            'rute_berangkat',
            'rute_kembali',
            array(
                'label' => $model->transportasiBerangkat->getAttributeLabel('Alat Transportasi Berangkat'),
                'value' => $model->transportasiBerangkat->desc
            ),
            array(
                'label' => $model->transportasiKembali->getAttributeLabel('Alat Transportasi Kembali'),
                'value' => $model->transportasiKembali->desc
            ),
            'tanggal_berangkat',
            'tanggal_mulai',
            'tanggal_selesai',
            'tanggal_kembali',
            'tanggal_pengajuan',
            'kebutuhan_khusus',
        ],
    ])
    ?>

</div>
</div>