<?php

namespace app\modules\produksi\models;

use Yii;
use app\modules\produksi\models\Pembelian;
/**
 * This is the model class for table "detile_pembelian".
 *
 * @property integer $id_detile_pembelian
 * @property string $nama_barang
 * @property string $kuantitas
 * @property string $harga
 *
 * @property PembelianDetilePembelianLink[] $pembelianDetilePembelianLinks
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
            [['nama_barang', 'kuantitas', 'harga'], 'required'],
            [['nama_barang', 'kuantitas'], 'string', 'max' => 255],
            [['harga'], 'string', 'max' => 45],
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
        ];
    }

    public function getListBarang(){
        $model_pembelian = new Pembelian();
        return $model_pembelian->getListBarang();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelianDetilePembelianLinks()
    {
        return $this->hasMany(PembelianDetilePembelianLink::className(), ['id_detile_pembelian' => 'id_detile_pembelian']);
    }
}
