<?php

namespace backend\modules\kpgw\models;

use Yii;

/**
 * This is the model class for table "hrdx_pegawai".
 *
 * @property integer $pegawai_id
 * @property string $profile_old_id
 * @property string $nama
 * @property string $nip
 * @property string $kpt_no
 * @property string $kbk_id
 * @property integer $ref_kbk_id
 * @property string $alias
 * @property string $posisi
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property integer $agama_id
 * @property integer $jenis_kelamin_id
 * @property integer $golongan_darah_id
 * @property string $hp
 * @property string $telepon
 * @property resource $alamat
 * @property string $alamat_libur
 * @property string $kecamatan
 * @property string $kota
 * @property integer $kabupaten_id
 * @property string $kode_pos
 * @property string $no_ktp
 * @property string $email
 * @property string $ext_num
 * @property string $study_area_1
 * @property string $study_area_2
 * @property string $jabatan
 * @property integer $jabatan_akademik_id
 * @property integer $gbk_1
 * @property integer $gbk_2
 * @property integer $status_ikatan_kerja_pegawai_id
 * @property string $status_akhir
 * @property integer $status_aktif_pegawai_id
 * @property string $tanggal_masuk
 * @property string $tanggal_keluar
 * @property string $nama_bapak
 * @property string $nama_ibu
 * @property string $status
 * @property integer $status_marital_id
 * @property string $nama_p
 * @property string $tgl_lahir_p
 * @property string $tmp_lahir_p
 * @property string $pekerjaan_ortu
 * @property integer $user_id
 * @property integer $role_id
 * @property integer $struktur_jabatan_id
 * @property integer $kuota_cuti_tahunan
 * @property integer $deleted
 * @property string $deleted_at
 * @property string $deleted_by
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 *
 * @property InstStrukturJabatan $strukturJabatan
 * @property HrdxRKuotaCutiTahunan $kuotaCutiTahunan
 * @property SysxRole $role
 * @property SysxUser $user
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $username;
    public $password;

    public static function tableName()
    {
        return 'hrdx_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            
            ['username', 'unique', 'targetClass' => '\backend\modules\kpgw\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],

            ['password', 'string', 'min' => 6],

            [['nama'],'required', 'message'=>'Nama tidak boleh kosong'],
            [['nip'],'required', 'message'=>'NIP tidak boleh kosong'],
            [['email'],'required', 'message'=>'Email tidak boleh kosong'],
            [['role_id'],'required', 'message'=>'Role tidak boleh kosong'],
            [['struktur_jabatan_id'],'required', 'message'=>'Jabatan tidak boleh kosong'],
            [['username'],'required', 'message'=>'Username tidak boleh kosong'],
            [['password'],'required', 'message'=>'Password surat tidak boleh kosong'],

            [['ref_kbk_id', 'agama_id', 'jenis_kelamin_id', 'golongan_darah_id', 'kabupaten_id', 'jabatan_akademik_id', 'gbk_1', 'gbk_2', 'status_ikatan_kerja_pegawai_id', 'status_aktif_pegawai_id', 'status_marital_id', 'user_id', 'role_id', 'struktur_jabatan_id','deleted', 'kuota_cuti_tahunan'], 'integer'],
            [['alamat', 'email'], 'string'],
            [['tanggal_masuk', 'tanggal_keluar', 'tgl_lahir_p', 'deleted_at', 'created_at', 'updated_at'], 'safe'],
            [['profile_old_id', 'kbk_id', 'hp'], 'string', 'max' => 20],
            [['nama'], 'string', 'max' => 135],
            [['nip', 'telepon'], 'string', 'max' => 45],
            [['kpt_no'], 'string', 'max' => 10],
            [['alias'], 'string', 'max' => 9],
            [['posisi', 'pekerjaan_ortu'], 'string', 'max' => 100],
            [['tempat_lahir', 'tgl_lahir'], 'string', 'max' => 60],
            [['alamat_libur', 'kecamatan'], 'string', 'max' => 150],
            [['kota', 'study_area_1', 'study_area_2', 'nama_bapak', 'nama_ibu', 'nama_p', 'tmp_lahir_p'], 'string', 'max' => 50],
            [['kode_pos'], 'string', 'max' => 15],
            [['no_ktp'], 'string', 'max' => 255],
            [['ext_num'], 'string', 'max' => 30],
            [['jabatan', 'status_akhir', 'status'], 'string', 'max' => 1],
            [['deleted_by', 'created_by', 'updated_by'], 'string', 'max' => 32],
            [['struktur_jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => StrukturJabatan::className(), 'targetAttribute' => ['struktur_jabatan_id' => 'struktur_jabatan_id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'role_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pegawai_id' => 'Pegawai ID',
            'profile_old_id' => 'Profile Old ID',
            'nama' => 'Nama',
            'nip' => 'Nip',
            'kpt_no' => 'Kpt No',
            'kbk_id' => 'Kbk ID',
            'ref_kbk_id' => 'Ref Kbk ID',
            'alias' => 'Alias',
            'posisi' => 'Posisi',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'agama_id' => 'Agama ID',
            'jenis_kelamin_id' => 'Jenis Kelamin ID',
            'golongan_darah_id' => 'Golongan Darah ID',
            'hp' => 'Hp',
            'telepon' => 'Telepon',
            'alamat' => 'Alamat',
            'alamat_libur' => 'Alamat Libur',
            'kecamatan' => 'Kecamatan',
            'kota' => 'Kota',
            'kabupaten_id' => 'Kabupaten ID',
            'kode_pos' => 'Kode Pos',
            'no_ktp' => 'No Ktp',
            'email' => 'Email',
            'ext_num' => 'Ext Num',
            'study_area_1' => 'Study Area 1',
            'study_area_2' => 'Study Area 2',
            'jabatan' => 'Jabatan',
            'jabatan_akademik_id' => 'Jabatan Akademik ID',
            'gbk_1' => 'Gbk 1',
            'gbk_2' => 'Gbk 2',
            'status_ikatan_kerja_pegawai_id' => 'Status Ikatan Kerja Pegawai ID',
            'status_akhir' => 'Status Akhir',
            'status_aktif_pegawai_id' => 'Status Aktif Pegawai ID',
            'tanggal_masuk' => 'Tanggal Masuk',
            'tanggal_keluar' => 'Tanggal Keluar',
            'nama_bapak' => 'Nama Bapak',
            'nama_ibu' => 'Nama Ibu',
            'status' => 'Status',
            'status_marital_id' => 'Status Marital ID',
            'nama_p' => 'Nama P',
            'tgl_lahir_p' => 'Tgl Lahir P',
            'tmp_lahir_p' => 'Tmp Lahir P',
            'pekerjaan_ortu' => 'Pekerjaan Ortu',
            'user_id' => 'User',
            'role_id' => 'Role',
            'struktur_jabatan_id' => 'Jabatan/Posisi',
            'kuota_cuti_tahunan' => 'Kuota Cuti Tahunan',
            'deleted' => 'Deleted',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    public function register()
    {
        if ($this->validate()){ //rules harus dijalankan 
                    $user = new User();
                    $user->username = $this->username;
                    $user->email = $this->email;
                    $user->setPassword($this->password);
                    $user->generateAuthKey();
                    
                    if($user->save()){
                        //transaction begin
                        $pegawai = new Pegawai();
                        $pegawai->user_id = $user->user_id;
                        $pegawai->nama = $this->nama;
                        $pegawai->nip = $this->nip;
                        $pegawai->email = $user->email;
                        $pegawai->kuota_cuti_tahunan = $this->kuota_cuti_tahunan;
                        $pegawai->role_id = $this->role_id;
                        $pegawai->struktur_jabatan_id = $this->struktur_jabatan_id;
                        $pegawai->save();
                        if ($pegawai->save()) {
                            return $user; //return user yg berhasil register
                        }else{
                            print_r($pegawai->errors);
                        }
                    }else{
                        print_r($user->errors);
                    }
        
                    return false;
                }
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStrukturJabatan()
    {
        return $this->hasOne(StrukturJabatan::className(), ['struktur_jabatan_id' => 'struktur_jabatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['role_id' => 'role_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
