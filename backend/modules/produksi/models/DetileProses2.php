<?php

namespace app\modules\produksi\models;

use Yii;
use app\modules\gudang\models\BarangKeluar;
/**
 * This is the model class for table "detile_proses_2".
 *
 * @property integer $id
 * @property integer $id_proses_2
 * @property integer $id_keluar_barang
 * @property string $kode_terima
 * @property string $tanggal
 * @property string $keterangan
 *
 * @property BarangKeluar $idKeluarBarang
 * @property Proses2 $idProses2
 */
class DetileProses2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detile_proses_2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proses_2'], 'required'],
            [['id_proses_2', 'id_keluar_barang'], 'integer'],
            [['tanggal'], 'safe'],
            [['kode_terima'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 1024],
            [['id_keluar_barang'], 'exist', 'skipOnError' => true, 'targetClass' => BarangKeluar::className(), 'targetAttribute' => ['id_keluar_barang' => 'id_keluar']],
            [['id_proses_2'], 'exist', 'skipOnError' => true, 'targetClass' => Proses2::className(), 'targetAttribute' => ['id_proses_2' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_proses_2' => 'Id Proses 2',
            'id_keluar_barang' => 'Nota Barang Keluar',
            'kode_terima' => 'Kode Terima',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKeluarBarang()
    {
        return $this->hasOne(BarangKeluar::className(), ['id_keluar' => 'id_keluar_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProses2()
    {
        return $this->hasOne(Proses2::className(), ['id' => 'id_proses_2']);
    }
}
