<?php

namespace app\modules\produksi\models;

use Yii;
use app\modules\produksi\models\Supplier;
use app\modules\gudang\models\Barang;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pembelian".
 *
 * @property integer $id_pembelian
 * @property string $kode_pembelian
 * @property string $jenis_pembelian
 * @property string $tanggal
 * @property string $kode_supplier
 *
 * @property Supplier $kodeSupplier
 * @property PembelianDetilePembelianLink[] $pembelianDetilePembelianLinks
 */
class Pembelian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembelian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_pembelian', 'jenis_pembelian', 'tanggal', 'kode_supplier'], 'required'],
            [['jenis_pembelian'], 'string'],
            [['tanggal'], 'safe'],
            [['kode_pembelian'], 'string', 'max' => 45],
            [['kode_supplier'], 'string', 'max' => 50],
            [['kode_supplier'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['kode_supplier' => 'kode']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pembelian' => 'Id Pembelian',
            'kode_pembelian' => 'Kode Pembelian',
            'jenis_pembelian' => 'Jenis Pembelian',
            'tanggal' => 'Tanggal',
            'kode_supplier' => 'Kode Supplier',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeSupplier()
    {
        return $this->hasOne(Supplier::className(), ['kode' => 'kode_supplier']);
    }

    public function getListBarang(){
        $modelBarang = Barang::find()->all();

        return ArrayHelper::map($modelBarang,'nama_barang','nama_barang');
    }

    public function getListSupplier(){

        $list = Supplier::find()->all();
        return ArrayHelper::map($list, 'kode', 'nama');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelianDetilePembelianLinks()
    {
        return $this->hasMany(PembelianDetilePembelianLink::className(), ['id_pembelian' => 'id_pembelian']);
    }
}
