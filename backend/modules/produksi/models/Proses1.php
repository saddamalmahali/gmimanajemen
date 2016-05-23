<?php

namespace app\modules\produksi\models;

use Yii;
use app\modules\gudang\models\BarangKeluar;
use app\modules\gudang\models\BarangKeluarMentah;
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
            [['id_barang_keluar', 'selesai', 'kode_proses_1', 'id_mentahan'], 'required'],
            [['id_barang_keluar', 'selesai', 'id_mentahan'], 'integer'],
			[['kode_proses_1'], 'string', 'max'=>10],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string', 'max' => 1024],
            
            [['id_mentahan'], 'exist', 'skipOnError'=>true, 'targetClass'=>BarangKeluarMentah::classname(), 'targetAttribute'=>['id_mentahan'=>'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_mentahan' => 'Nota Pengeluaran Barang Mentah',
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

    public function getDetileProses1()
    {
        return $this->hasMany(DetileProses1::className(), ['id_proses_1' => 'id']);
    }
	
	public function getListBarangKeluar(){
		$query = new Query();
        $query->select('id_barang_keluar')
            ->from('detile_proses_1');
        $pembelian = $query->all();
		
		$barangKeluar = BarangKeluar::find()->asArray()->where(['not in', 'id_keluar', $query])->all();
		
		return ArrayHelper::map($barangKeluar, 'id_keluar', 'kode_keluar');
	}

    public function getListBarangKeluarMentah(){
        $query = new Query();
        $query->select('id_mentahan')
            ->from('proses_1');
        $barang_keluar = $query->all();
        $barangMentahan = BarangKeluarMentah::find()->asArray()->where(['not in', 'id', $query])->all();

        return ArrayHelper::map($barangMentahan, 'id', 'kode_keluar');
    }

    public function getBarangKeluarMentah($id_mentahan){
        $dataBarangKeluarMentah = BarangKeluarMentah::find()->where(['id'=>$id_mentahan])->one();

        return $dataBarangKeluarMentah;
    }
}
