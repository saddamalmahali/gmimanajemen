<?php

namespace app\modules\gudang\models;

use Yii;
use app\modules\gudang\models\Kategori;
use app\modules\gudang\models\Satuan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "barang".
 *
 * @property integer $id_barang
 * @property string $id_satuan
 * @property string $kode_barang
 * @property string $nama_barang
 * @property string $keterangan
 * @property string $id_kategori
 *
 * @property Kategori $idKategori
 * @property Satuan $idSatuan
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_satuan', 'kode_barang', 'nama_barang', 'id_kategori'], 'required'],
            [['id_satuan', 'id_kategori'], 'string', 'max' => 11],
            [['kode_barang'], 'string', 'max' => 10],
            [['nama_barang', 'keterangan'], 'string', 'max' => 255],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['id_kategori' => 'id_kategori']],
            [['id_satuan'], 'exist', 'skipOnError' => true, 'targetClass' => Satuan::className(), 'targetAttribute' => ['id_satuan' => 'id_satuan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_barang' => 'Id Barang',
            'id_satuan' => 'Jenis Satuan',
            'kode_barang' => 'Kode Barang',
            'nama_barang' => 'Nama Barang',
            'keterangan' => 'Keterangan',
            'id_kategori' => 'Kategori',
        ];
    }

    public function getListKategori(){
        $listkategori = Kategori::find()->all();

        return ArrayHelper::map($listkategori,'id_kategori', 'nama_kategori');
    }

    public function getListSatuan(){
        $listsatuan = Satuan::find()->all();

        return ArrayHelper::map($listsatuan, 'id_satuan', 'nama_satuan');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKategori()
    {
        return $this->hasOne(Kategori::className(), ['id_kategori' => 'id_kategori']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSatuan()
    {
        return $this->hasOne(Satuan::className(), ['id_satuan' => 'id_satuan']);
    }
}
