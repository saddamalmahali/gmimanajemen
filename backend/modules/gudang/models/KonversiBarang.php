<?php

namespace app\modules\gudang\models;

use Yii;

/**
 * This is the model class for table "konversi_barang".
 *
 * @property integer $id_konversi
 * @property string $jenis_satuan
 * @property string $nilai
 * @property integer $id_barang
 *
 * @property Barang $idBarang
 */
class KonversiBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'konversi_barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barang'], 'integer'],
            [['jenis_satuan', 'nilai'], 'string', 'max' => 45],
            [['id_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['id_barang' => 'id_barang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_konversi' => 'Id Konversi',
            'jenis_satuan' => 'Jenis Satuan',
            'nilai' => 'Nilai',
            'id_barang' => 'Id Barang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarang()
    {
        return $this->hasOne(Barang::className(), ['id_barang' => 'id_barang']);
    }
}
