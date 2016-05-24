<?php

namespace app\modules\gudang\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\gudang\models\Barang;

/**
 * BarangSearch represents the model behind the search form about `app\modules\gudang\models\Barang`.
 */
class BarangSearch extends Barang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barang'], 'integer'],
            [['id_satuan', 'kode_barang', 'nama_barang', 'keterangan', 'id_kategori'], 'safe'],
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
        $query = Barang::find()->orderBy(['kode_barang'=>'asc']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>10
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_barang' => $this->id_barang,
        ]);

        $query->andFilterWhere(['like', 'id_satuan', $this->id_satuan])
            ->andFilterWhere(['like', 'kode_barang', $this->kode_barang])
            ->andFilterWhere(['like', 'nama_barang', $this->nama_barang])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'id_kategori', $this->id_kategori]);

        return $dataProvider;
    }
}
