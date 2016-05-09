<?php

namespace app\modules\produksi\models;

use Yii;
use app\modules\gudang\models\Barang;

/**
 * This is the model class for table "detile_pembelian".
 *
 * @property integer $id_detile_pembelian
 * @property string $nama_barang
 * @property string $kuantitas
 * @property string $harga
 * @property integer $id_pembelian
 *
 * @property Pembelian $idPembelian
 */
class DetilePembelian extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detile_pembelian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_barang', 'kode_barang','kuantitas', 'harga', 'id_pembelian'], 'required'],
            [['id_pembelian'], 'integer'],
            [['kode_barang'], 'string', 'max'=>10],
            [['nama_barang', 'kuantitas'], 'string', 'max' => 255],
            [['harga'], 'string', 'max' => 45],
            [['id_pembelian'], 'exist', 'skipOnError' => true, 'targetClass' => Pembelian::className(), 'targetAttribute' => ['id_pembelian' => 'id_pembelian']],
            [['kode_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['kode_barang' => 'kode_barang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_detile_pembelian' => 'Id Detile Pembelian',
            'nama_barang' => 'Nama Barang',
            'kuantitas' => 'Kuantitas',
            'harga' => 'Harga',
            'id_pembelian' => 'Id Pembelian',
            'kode_barang'=>'Kode'
        ];
    }

    public function getNamaBarang($kode_barang){
        $modelBarang = Barang::find()->where(['kode_barang'=>$kode_barang])->one();

        return $modelBarang;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPembelian()
    {
        return $this->hasOne(Pembelian::className(), ['id_pembelian' => 'id_pembelian']);
    }
}
