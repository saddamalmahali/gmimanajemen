<?php

namespace app\modules\gudang\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property string $id_kategori
 * @property string $nama_kategori
 * @property string $keterangan
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kategori', 'nama_kategori', 'keterangan'], 'required'],
            [['id_kategori'], 'string', 'max' => 20],
            [['nama_kategori'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kategori' => 'ID Kategori',
            'nama_kategori' => 'Nama Kategori',
            'keterangan' => 'Keterangan',
        ];
    }
}
