<?php

namespace app\modules\produksi\models;

use Yii;

/**
 * This is the model class for table "pembelian_detile_pembelian_link".
 *
 * @property integer $id_pembelian
 * @property integer $id_detile_pembelian
 *
 * @property DetilePembelian $idDetilePembelian
 * @property Pembelian $idPembelian
 */
class PembelianDetilePembelianLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembelian_detile_pembelian_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pembelian', 'id_detile_pembelian'], 'integer'],
            [['id_detile_pembelian'], 'exist', 'skipOnError' => true, 'targetClass' => DetilePembelian::className(), 'targetAttribute' => ['id_detile_pembelian' => 'id_detile_pembelian']],
            [['id_pembelian'], 'exist', 'skipOnError' => true, 'targetClass' => Pembelian::className(), 'targetAttribute' => ['id_pembelian' => 'id_pembelian']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pembelian' => 'Id Pembelian',
            'id_detile_pembelian' => 'Id Detile Pembelian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDetilePembelian()
    {
        return $this->hasOne(DetilePembelian::className(), ['id_detile_pembelian' => 'id_detile_pembelian']);
    }

    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPembelian()
    {
        return $this->hasOne(Pembelian::className(), ['id_pembelian' => 'id_pembelian']);
    }
}
