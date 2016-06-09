<?php

namespace app\modules\gudang\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\gudang\models\BarangKeluarMentah;

/**
 * BarangKeluarMentahSearch represents the model behind the search form about `app\modules\gudang\models\BarangKeluarMentah`.
 */
class BarangKeluarMentahSearch extends BarangKeluarMentah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_masuk_barang', 'kuantitas'], 'integer'],
            [['kode_keluar', 'tanggal_keluar', 'keterangan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BarangKeluarMentah::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>5,
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_masuk_barang' => $this->id_masuk_barang,
            'kuantitas' => $this->kuantitas,
        ]);

        $query->andFilterWhere(['like', 'kode_keluar', $this->kode_keluar])
            ->andFilterWhere(['like', 'tanggal_keluar', $this->tanggal_keluar])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
