<?php

namespace app\modules\produksi\models;

use Yii;
use app\modules\produksi\models\Supplier;
use yii\helpers\ArrayHelper;
use app\modules\gudang\models\Barang;

/**
 * This is the model class for table "pembelian".
 *
 * @property integer $id_pembelian
 * @property string $kode_pembelian
 * @property string $jenis_pembelian
 * @property string $tanggal
 * @property string $kode_supplier
 *
 * @property DetilePembelian[] $detilePembelians
 * @property Supplier $kodeSupplier
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
            [['kredit'], 'integer'],
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
            'kode_barang' => 'Kode Barang',
            'kredit'=>'Kredit'
        ];
    }

    public function getListSupplier(){
        $list_supplier = Supplier::find()->all();

        return ArrayHelper::map($list_supplier, 'kode', 'kode');

    }

    

    public function getListBarang(){
        $list_barang = Barang::find()->all();

        return ArrayHelper::map($list_barang, 'kode_barang', 'nama_barang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetilePembelians()
    {
        return $this->hasMany(DetilePembelian::className(), ['id_pembelian' => 'id_pembelian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeSupplier()
    {
        return $this->hasOne(Supplier::className(), ['kode' => 'kode_supplier']);
    }

    
}
