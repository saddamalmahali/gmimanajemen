<?php

namespace app\modules\produksi\models;

use Yii;
use app\modules\gudang\models\BarangKeluar;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * This is the model class for table "proses_1".
 *
 * @property integer $id
 * @property integer $id_barang_keluar
 * @property string $tanggal
 * @property string $keterangan
 * @property integer $selesai
 *
 * @property BarangKeluar $idBarangKeluar
 */
class Proses1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proses_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barang_keluar', 'selesai'], 'required'],
            [['id_barang_keluar', 'selesai'], 'integer'],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string', 'max' => 1024],
            [['id_barang_keluar'], 'exist', 'skipOnError' => true, 'targetClass' => BarangKeluar::className(), 'targetAttribute' => ['id_barang_keluar' => 'id_keluar']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_barang_keluar' => 'Barang Keluar',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
            'selesai' => 'Selesai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarangKeluar()
    {
        return $this->hasOne(BarangKeluar::className(), ['id_keluar' => 'id_barang_keluar']);
    }
	
	public function getListBarangKeluar(){
		$query = new Query();
        $query->select('id_barang_keluar')
            ->from('proses_1');
        $pembelian = $query->all();
		
		$barangKeluar = BarangKeluar::find()->asArray()->where(['not in', 'id_keluar', $query])->all();
		
		return ArrayHelper::map($barangKeluar, 'id_keluar', 'kode_keluar');
	}
}
