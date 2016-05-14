<?php

namespace app\modules\gudang\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "barang_keluar".
 *
 * @property integer $id_keluar
 * @property string $kode_keluar
 * @property string $kategori_barang
 * @property string $tanggal_keluar
 * @property string $keterangan
 *
 * @property Kategori $kategoriBarang
 * @property DetileBarangKeluar[] $detileBarangKeluars
 */
class BarangKeluar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang_keluar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_keluar'], 'safe'],
            [['kode_keluar'], 'string', 'max' => 45],
            [['kategori_barang'], 'string', 'max' => 11],
            [['keterangan'], 'string', 'max' => 1024],
            [['kode_keluar'], 'unique'],
            [['kategori_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['kategori_barang' => 'id_kategori']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_keluar' => 'Id Keluar',
            'kode_keluar' => 'Kode Keluar',
            'kategori_barang' => 'Kategori Barang',
            'tanggal_keluar' => 'Tanggal Keluar',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategoriBarang()
    {
        return $this->hasOne(Kategori::className(), ['id_kategori' => 'kategori_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetileBarangKeluars()
    {
        return $this->hasMany(DetileBarangKeluar::className(), ['id_barang_keluar' => 'id_keluar']);
    }

    public function getListKategori(){
        $list_kategori = Kategori::find()->asArray()->all();

        return ArrayHelper::map($list_kategori, 'id_kategori', 'nama_kategori');
    }
}
