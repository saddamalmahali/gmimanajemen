<?php

namespace app\modules\keuangan\models;

use Yii;
use app\modules\produksi\models\Pembelian;

/**
 * This is the model class for table "status_cicilan_pembelian".
 *
 * @property integer $id
 * @property integer $id_pembelian
 * @property integer $status
 *
 * @property Pembelian $idPembelian
 */
class StatusCicilanPembelian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_cicilan_pembelian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pembelian', 'status'], 'integer'],
            [['id_pembelian'], 'exist', 'skipOnError' => true, 'targetClass' => Pembelian::className(), 'targetAttribute' => ['id_pembelian' => 'id_pembelian']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pembelian' => 'Id Pembelian',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPembelian()
    {
        return $this->hasOne(Pembelian::className(), ['id_pembelian' => 'id_pembelian']);
    }
}
