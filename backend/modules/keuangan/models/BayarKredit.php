<?php

namespace app\modules\keuangan\models;

use Yii;
use app\modules\produksi\models\Pembelian;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * This is the model class for table "bayar_kredit".
 *
 * @property integer $id
 * @property string $kode_pembelian
 * @property string $tanggal
 * @property double $jumlah_bayar
 * @property string $keterangan
 *
 * @property Pembelian $kodePembelian
 */
class BayarKredit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bayar_kredit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['tanggal', 'jumlah_bayar', 'cicilan_ke', 'kode_pembelian'], 'required'],
            [['tanggal'], 'safe'],
            [['jumlah_bayar'], 'number'],
			[['cicilan_ke'], 'integer'],
            [['kode_pembelian'], 'string', 'max' => 45],
            [['keterangan'], 'string', 'max' => 1024],
            [['kode_pembelian'], 'exist', 'skipOnError' => true, 'targetClass' => Pembelian::className(), 'targetAttribute' => ['kode_pembelian' => 'kode_pembelian']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_pembelian' => 'Kode Pembelian',
            'tanggal' => 'Tanggal',
            'jumlah_bayar' => 'Jumlah Bayar',
            'keterangan' => 'Keterangan',
			'cicilan_ke'=>'Cicilan yang Ke',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePembelian()
    {
        return $this->hasOne(Pembelian::className(), ['kode_pembelian' => 'kode_pembelian']);
    }
	
	public function getPembelianKredit(){
		
		$query = new Query();
		$query = $query->select('id_pembelian')
				->from('status_cicilan_pembelian')
				->where(['status'=>1]);
		
		$pembelian = Pembelian::find()
						->asArray()
						->where(['kredit'=>1])
						->andWhere(['not in', 'id_pembelian', $query])
						->all();
		
		return ArrayHelper::map($pembelian, 'kode_pembelian', 'kode_pembelian');
	}
}
