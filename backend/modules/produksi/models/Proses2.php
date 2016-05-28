<?php

namespace app\modules\produksi\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * This is the model class for table "proses_2".
 *
 * @property integer $id
 * @property integer $id_proses_1
 * @property string $kode_proses
 * @property string $tanggal
 * @property string $keterangan
 * @property integer $selesai
 *
 * @property DetileProses2[] $detileProses2s
 * @property Proses1 $idProses1
 */
class Proses2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proses_2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proses_1', 'kode_proses', 'tanggal'], 'required'],
            [['id_proses_1', 'selesai'], 'integer'],
            [['tanggal'], 'safe'],
            [['kode_proses'], 'string', 'max' => 10],
            [['keterangan'], 'string', 'max' => 1024],
            [['id_proses_1'], 'unique'],
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
            'id_proses_1' => 'Nota Proses 1',
            'kode_proses' => 'Kode Proses',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
            'selesai' => 'Selesai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetileProses2s()
    {
        return $this->hasMany(DetileProses2::className(), ['id_proses_2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProses1()
    {
        return $this->hasOne(Proses1::className(), ['id' => 'id_proses_1']);
    }
	
	public function getListProses1(){
        $query = new Query();
        $query->select('id_proses_1')
            ->from('proses_2');
        $proses_1 = $query->all();
		$data_proses = Proses1::find()->asArray()->where(['not in', 'id', $query])->all();
		
		return ArrayHelper::map($data_proses, 'id', 'kode_proses_1');
	}
}
