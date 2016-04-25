<?php

namespace app\modules\preferences\models;

use Yii;

/**
 * This is the model class for table "satuan".
 *
 * @property integer $id_satuan
 * @property string $nama_satuan
 * @property string $satuan
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
            [['nama_satuan', 'satuan', 'id_satuan'], 'required'],
            [['nama_satuan', 'satuan', 'id_satuan'], 'string', 'max' => 100],
            ['keterangan', 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_satuan' => 'ID Satuan',
            'nama_satuan' => 'Nama Satuan',
            'satuan' => 'Satuan',
            'keterangan' => 'Keterangan',
        ];
    }
}
