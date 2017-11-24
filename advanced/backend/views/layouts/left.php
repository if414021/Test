<?php 
use backend\modules\kpgw\models\Pegawai;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <?php $allrequesting = backend\modules\kpgw\models\SuratTugas::requestingViewbyHRD();
            $allrequestingcuti = backend\modules\kpgw\models\SuratCuti::requestingViewbyAtasan();
              $user = Yii::$app->user->id; 
              $pegawai = Pegawai::find()->where(['user_id' => $user])->one();
              $notifwr =  backend\modules\kpgw\models\SuratTugas::statusApprovebywr();
              $notifwrcuti =  backend\modules\kpgw\models\SuratCuti::statusApprovebywr();
              $approvecuti = backend\modules\kpgw\models\SuratCuti::statusApproveall();
              $allnotifcuti = $allrequesting + $approvecuti;
              $allnotif = $notifwr + $notifwrcuti;
        ?>

        <?php if($pegawai['role_id'] == 1) { ?>

        <?=dmstr\widgets\Menu::widget( 
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [    
                    ['label' => 'Beranda', 'icon' => 'glyphicon glyphicon-home', 'url' => ['/kpgw/default/index']],
                    ['label' => 'Data Pegawai', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['/kpgw/pegawai/index']],
                    
                    [
                        'label' => 'Surat Tugas',
                        'icon' => 'glyphicon glyphicon-envelope',
                        'url' => '#',
                        'items' => [    
                            ['label' => 'Cek Surat Tugas', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpgw/surat-tugas/index'],],
                            ['label' => 'Daftar Request Surat Tugas', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpgw/surat-tugas/surat-tugas-index'],],
                            ['label' => 'Request Surat Tugas', 'icon' => 'glyphicon glyphicon-plus', 'url' => ['/kpgw/surat-tugas/surat-tugas-add'],],
                        ],
                    ],
                    [
                        'label' => 'Surat Cuti',
                        'icon' => 'glyphicon glyphicon-envelope',
                        'url' => '#',
                        'items' => [    
                            ['label' => 'Cek Surat Cuti', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpgw/surat-cuti/index'],],
                            ['label' => 'Daftar Request Surat Cuti', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpgw/surat-cuti/surat-cuti-index-by-hrd'],],
                            ['label' => 'Request Surat Cuti', 'icon' => 'glyphicon glyphicon-plus', 'url' => ['/kpgw/surat-cuti/surat-cuti-add'],],
                        ],
                    ],
                    [
                        'label' => 'Data Pelengkap',
                        'icon' => 'glyphicon glyphicon-flag',
                        'url' => '#',
                        'items' => [    
                            ['label' => 'Jabatan', 'icon' => 'file-code-o', 'url' => ['/kpgw/struktur-jabatan/index'],],
                            ['label' => 'Transportasi', 'icon' => 'file-code-o', 'url' => ['/kpgw/transportasi/index'],],
                            ['label' => 'Supir', 'icon' => 'dashboard', 'url' => ['/kpgw/supir/index'],],
                            ['label' => 'Signer', 'icon' => 'file-code-o', 'url' => ['/kpgw/signer/index'],],
                            ['label' => 'Kategori Surat Tugas', 'icon' => 'dashboard', 'url' => ['/kpgw/kategori-surat-tugas/index'],],
                            ['label' => 'Kategori Surat Cuti', 'icon' => 'dashboard', 'url' => ['/kpgw/kategori-surat-cuti/index'],],
                        ],
                    ],
                    [
                        'label' => 'Notifikasi (' .$allnotifcuti.'' . ')',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [    
                            ['label' => 'Notifikasi Surat Tugas (' .$allrequesting.'' . ')', 'icon' => 'file-code-o', 'url' => ['/kpgw/surat-tugas/surat-tugas-notifikasi'],],
                            ['label' => 'Notifikasi Surat Cuti (' .$notifwrcuti.'' . ') ', 'icon' => 'dashboard', 'url' => ['/kpgw/surat-cuti/surat-cuti-notifikasi-by-hrd'],],
                        ],
                    ],
                    ['label' => 'Laporan Tugas', 'icon' => 'fa fa-book', 'url' => ['/kpgw/laporan/index']],
                    ['label' => 'Cetak Surat Tugas', 'icon' => 'glyphicon glyphicon-print', 'url' => ['/kpgw/surat-tugas/surat-tugas-print']],
                ],
            ]
        ) ?>

        <?php } else if ($pegawai['role_id'] == 3 || $pegawai['role_id'] == 4) { ?>

            <?=dmstr\widgets\Menu::widget( 
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [    
                    ['label' => 'Beranda', 'icon' => 'glyphicon glyphicon-home', 'url' => ['/kpgw/default/index']],
                    
                    [
                        'label' => 'Surat Tugas',
                        'icon' => 'glyphicon glyphicon-envelope',
                        'url' => '#',
                        'items' => [    
                            ['label' => 'Cek Surat Tugas', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpgw/surat-tugas/index'],],
                            ['label' => 'Daftar Request Surat Tugas', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpgw/surat-tugas/surat-tugas-index-by-wr'],],
                            ['label' => 'Request Surat Tugas', 'icon' => 'glyphicon glyphicon-plus', 'url' => ['/kpgw/surat-tugas/surat-tugas-add'],],
                        ],
                    ],
                    [
                        'label' => 'Surat Cuti',
                        'icon' => 'glyphicon glyphicon-envelope',
                        'url' => '#',
                        'items' => [    
                            ['label' => 'Cek Surat Cuti', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpgw/surat-cuti/index'],],
                            ['label' => 'Daftar Request Surat Cuti', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpgw/surat-cuti/surat-cuti-index-by-wr'],],
                            ['label' => 'Request Surat Cuti', 'icon' => 'glyphicon glyphicon-plus', 'url' => ['/kpgw/surat-cuti/surat-cuti-add'],],
                        ],
                    ],
                    [
                        'label' => 'Notifikasi (' .$allnotif.'' . ')',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [    
                            ['label' => 'Notifikasi Surat Tugas (' .$notifwr.'' . ')', 'icon' => 'file-code-o', 'url' => ['/kpgw/surat-tugas/surat-tugas-notifikasi-by-wr'],],
                            ['label' => 'Notifikasi Surat Cuti (' .$notifwrcuti.'' . ') ', 'icon' => 'dashboard', 'url' => ['/kpgw/surat-cuti/surat-cuti-notifikasi-by-wr'],],
                        ],
                    ],
                    ['label' => 'Laporan Tugas', 'icon' => 'fa fa-book', 'url' => ['/kpgw/laporan/laporan-index']],
                ],
            ]
        ) ?>


        <?php } else { ?>
            <?=dmstr\widgets\Menu::widget( 
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [    
                    ['label' => 'Beranda', 'icon' => 'glyphicon glyphicon-home', 'url' => ['/kpgw/default/index']],
                    
                    [
                        'label' => 'Surat Tugas',
                        'icon' => 'glyphicon glyphicon-envelope',
                        'url' => '#',
                        'items' => [    
                            ['label' => 'Cek Surat Tugas', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpgw/surat-tugas/index'],],
                            ['label' => 'Request Surat Tugas', 'icon' => 'glyphicon glyphicon-plus', 'url' => ['/kpgw/surat-tugas/surat-tugas-add'],],
                        ],
                    ],
                    [
                        'label' => 'Surat Cuti',
                        'icon' => 'glyphicon glyphicon-envelope',
                        'url' => '#',
                        'items' => [    
                            ['label' => 'Cek Surat Cuti', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpgw/surat-cuti/index'],],
                            ['label' => 'Daftar Request Surat Cuti', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpgw/surat-cuti/surat-cuti-index-by-atasan'],],
                            ['label' => 'Request Surat Cuti', 'icon' => 'glyphicon glyphicon-plus', 'url' => ['/kpgw/surat-cuti/surat-cuti-add'],],
                        ],
                    ],
                    ['label' => 'Notifikasi Surat Cuti(' .$allrequestingcuti.'' . ')', 'icon' => 'glyphicon glyphicon-bell', 'url' => ['/kpgw/surat-cuti/surat-cuti-notifikasi']],
                    ['label' => 'Laporan Tugas', 'icon' => 'fa fa-book', 'url' => ['/kpgw/laporan/laporan-index']],
                ],
            ]
        ) ?>

        <?php }?>
    </section>

</aside>
