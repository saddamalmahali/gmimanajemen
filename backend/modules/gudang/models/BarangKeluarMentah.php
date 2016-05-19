<?php

namespace app\modules\gudang\models;

use Yii;
use yii\data\SqlDataProvider;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "barang_keluar_mentah".
 *
 * @property integer $id
 * @property string $kode_keluar
 * @property string $tanggal_keluar
 * @property integer $id_masuk_barang
 * @property integer $kuantitas
 * @property string $keterangan
 *
 * @property MasukBarang $idMasukBarang
 */
class BarangKeluarMentah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang_keluar_mentah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_keluar', 'id_masuk_barang'], 'required'],
            [['id_masuk_barang', 'kuantitas'], 'integer'],
            [['kode_keluar'], 'string', 'max' => 10],
            [['tanggal_keluar', 'keterangan'], 'string', 'max' => 45],
            [['id_masuk_barang'], 'unique'],
            [['kode_keluar'], 'unique'],
            [['id_masuk_barang'], 'exist', 'skipOnError' => true, 'targetClass' => MasukBarang::className(), 'targetAttribute' => ['id_masuk_barang' => 'id_masuk']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_keluar' => 'Kode Keluar',
            'tanggal_keluar' => 'Tanggal Keluar',
            'id_masuk_barang' => 'Masuk Barang',
            'kuantitas' => 'Kuantitas',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMasukBarang()
    {
        return $this->hasOne(MasukBarang::className(), ['id_masuk' => 'id_masuk_barang']);
    }

    public function getKeMasukBarang(){
        $sql ="select  mb.kode_masuk, mb.id_masuk, p.kode_pembelian, s.nama, dp.kuantitas,
                    @sisa := dp.kuantitas - ifnull((select bkm.kuantitas from barang_keluar_mentah bkm where bkm.id_masuk_barang = mb.id_masuk), 0) 
                    as sisa
                from masuk_barang mb 
                inner join pembelian p on p.id_pembelian = mb.id_pembelian 
                join supplier s on s.kode = p.kode_supplier
                right join detile_pembelian dp on dp.id_pembelian = p.id_pembelian
                 right join barang b on b.kode_barang = dp.kode_barang
                join (select @sisa := 0) v
                where b.id_kategori like  'K-001'";

        $dataProvider = new SqlDataProvider([
                'sql'=>$sql,
            ]);

        $models = $dataProvider->getModels();

        return ArrayHelper::map($models, 'id_masuk', 'nama');
    }

    
}
