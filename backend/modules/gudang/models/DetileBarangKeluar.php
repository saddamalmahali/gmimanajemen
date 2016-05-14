<?php

namespace app\modules\gudang\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "detile_barang_keluar".
 *
 * @property integer $id_detile_keluar_barang
 * @property integer $id_barang_keluar
 * @property string $kode_barang
 * @property string $nama_barang
 * @property string $banyak
 * @property string $keterangan
 *
 * @property Barang $kodeBarang
 * @property BarangKeluar $idBarangKeluar
 */
class DetileBarangKeluar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detile_barang_keluar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barang_keluar'], 'integer'],
            [['kode_barang'], 'string', 'max' => 10],
            [['nama_barang', 'banyak'], 'string', 'max' => 45],
            [['keterangan'], 'string', 'max' => 1024],
            [['kode_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['kode_barang' => 'kode_barang']],
            [['id_barang_keluar'], 'exist', 'skipOnError' => true, 'targetClass' => BarangKeluar::className(), 'targetAttribute' => ['id_barang_keluar' => 'id_keluar']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Detile Keluar Barang',
            'id_barang_keluar' => 'Id Barang Keluar',
            'kode_barang' => 'Kode Barang',
            'nama_barang' => 'Nama Barang',
            'banyak' => 'Banyak',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarang()
    {
        return $this->hasOne(Barang::className(), ['kode_barang' => 'kode_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarangKeluar()
    {
        return $this->hasOne(BarangKeluar::className(), ['id_keluar' => 'id_barang_keluar']);
    }

    public function getListBarang(){
        $listBarang = Barang::find()->asArray()->all();

        return ArrayHelper::map($listBarang, 'kode_barang', 'nama_barang');
    }
}
