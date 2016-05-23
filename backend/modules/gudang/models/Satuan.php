<?php

namespace app\modules\gudang\models;

use Yii;

/**
 * This is the model class for table "satuan".
 *
 * @property string $id_satuan
 * @property string $nama_satuan
 * @property string $satuan
 * @property string $keterangan
 *
 * @property Barang[] $barangs
 */
class Satuan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'satuan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_satuan', 'nama_satuan', 'satuan', 'keterangan'], 'required'],
            [['id_satuan'], 'string', 'max' => 11],
            [['nama_satuan', 'satuan'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_satuan' => 'Id Satuan',
            'nama_satuan' => 'Nama Satuan',
            'satuan' => 'Satuan',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangs()
    {
        return $this->hasMany(Barang::className(), ['id_satuan' => 'id_satuan']);
    }
}
