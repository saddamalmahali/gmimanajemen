<?php

namespace app\modules\gudang\models;

use Yii;
use app\modules\produksi\models\Pembelian;
use yii\helpers\ArrayHelper;
use yii\db\Query;


/**
 * This is the model class for table "masuk_barang".
 *
 * @property integer $id_masuk
 * @property string $kode_masuk
 * @property integer $id_pembelian
 * @property string $tanggal_masuk
 * @property string $keterangan
 *
 * @property Pembelian $idPembelian
 */
class MasukBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masuk_barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_masuk', 'id_pembelian', 'tanggal_masuk'], 'required'],
            [['id_pembelian'], 'integer'],
            [['tanggal_masuk'], 'safe'],
            [['kode_masuk'], 'string', 'max' => 45],
            [['keterangan'], 'string', 'max' => 1024],
            [['id_pembelian'], 'exist', 'skipOnError' => true, 'targetClass' => Pembelian::className(), 'targetAttribute' => ['id_pembelian' => 'id_pembelian']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_masuk' => 'Id Masuk',
            'kode_masuk' => 'Kode Masuk',
            'id_pembelian' => 'Pembelian',
            'tanggal_masuk' => 'Tanggal Masuk',
            'keterangan' => 'Keterangan',
        ];
    }

    public function getListPembelian(){
        $query = new Query();
        $query->select('id_pembelian')
            ->from('masuk_barang');
        $pembelian = $query->all();

        $model = Pembelian::find()->asArray()->where(['not in', 'id_pembelian', $pembelian])->all();

        return ArrayHelper::map($model, 'id_pembelian', 'kode_pembelian');
    }

    protected function getPembelian(){
        
            $pembelian = $this->getIdPembelian()->one();

            return $pembelian;
        
    }

    public function getDataProvider(){
        $pembelian = getPembelian();


        return $pembelian;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPembelian()
    {
        return $this->hasOne(Pembelian::className(), ['id_pembelian' => 'id_pembelian']);
    }
}
