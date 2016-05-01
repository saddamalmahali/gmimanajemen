<?php

namespace app\modules\produksi\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id_supplier
 * @property string $kode
 * @property string $nama
 * @property string $alamat
 * @property string $phone
 * @property string $email
 * @property string $npwp
 * @property string $create_date
 *
 * @property Pembelian[] $pembelians
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'alamat', 'phone', 'email', 'npwp'], 'required'],
            [['create_date'], 'safe'],
            [['kode'], 'string', 'max' => 45],
            [['nama'], 'string', 'max' => 255],
            [['alamat'], 'string', 'max' => 1024],
            [['phone', 'email'], 'string', 'max' => 100],
            [['npwp'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_supplier' => 'Id Supplier',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'phone' => 'Phone',
            'email' => 'Email',
            'npwp' => 'Npwp',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelians()
    {
        return $this->hasMany(Pembelian::className(), ['kode_supplier' => 'kode']);
    }
}
