<?php

namespace app\modules\produksi\models;

use Yii;
use app\modules\gudang\models\BarangKeluar;

/**
 * This is the model class for table "detile_proses_1".
 *
 * @property integer $id
 * @property integer $id_proses_1
 * @property string $kode_terima
 * @property string $tanggal
 * @property integer $id_barang_keluar
 * @property string $keterangan
 *
 * @property BarangKeluar $idBarangKeluar
 * @property Proses1 $idProses1
 */
class DetileProses1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detile_proses_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proses_1'], 'required'],
            [['id_proses_1', 'id_barang_keluar'], 'integer'],
            [['tanggal'], 'safe'],
            [['kode_terima'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 45],
            [['id_barang_keluar'], 'exist', 'skipOnError' => true, 'targetClass' => BarangKeluar::className(), 'targetAttribute' => ['id_barang_keluar' => 'id_keluar']],
            [['id_proses_1'], 'exist', 'skipOnError' => true, 'targetClass' => Proses1::className(), 'targetAttribute' => ['id_proses_1' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_proses_1' => 'Id Proses 1',
            'kode_terima' => 'Kode Terima',
            'tanggal' => 'Tanggal',
            'id_barang_keluar' => 'Nota Barang Keluar',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarangKeluar()
    {
        return $this->hasOne(BarangKeluar::className(), ['id_keluar' => 'id_barang_keluar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProses1()
    {
        return $this->hasOne(Proses1::className(), ['id' => 'id_proses_1']);
    }
}
