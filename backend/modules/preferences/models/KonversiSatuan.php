<?php

namespace app\modules\preferences\models;

use Yii;
use app\modules\preferences\models\Satuan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "konversi_satuan".
 *
 * @property integer $id_konversi
 * @property string $satuan
 * @property integer $nilai
 * @property string $satuan2
 * @property integer $nilai2
 *
 * @property Satuan $satuan0
 */
class KonversiSatuan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'konversi_satuan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['satuan', 'nilai', 'satuan2', 'nilai2'], 'required'],
            [['nilai', 'nilai2'], 'integer'],
            [['satuan'], 'string', 'max' => 11],
            [['satuan2'], 'string', 'max' => 45],
            [['satuan'], 'exist', 'skipOnError' => true, 'targetClass' => Satuan::className(), 'targetAttribute' => ['satuan' => 'id_satuan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_konversi' => 'Id Konversi',
            'satuan' => 'Satuan',
            'nilai' => 'Nilai',
            'satuan2' => 'Satuan2',
            'nilai2' => 'Nilai2',
        ];
    }

    public function getListSatuan(){
        $data = Satuan::find()->all();

        return ArrayHelper::map($data, 'id_satuan', 'satuan');
    }

    public function getListJenisSatuan(){
        $data = Satuan::find()->all();
        return ArrayHelper::map($data, 'satuan', 'satuan');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatuan0()
    {
        return $this->hasOne(Satuan::className(), ['id_satuan' => 'satuan']);
    }
}
