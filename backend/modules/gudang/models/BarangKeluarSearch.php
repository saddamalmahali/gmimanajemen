<?php

namespace app\modules\gudang\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\gudang\models\BarangKeluar;

/**
 * BarangKeluarSearch represents the model behind the search form about `app\modules\gudang\models\BarangKeluar`.
 */
class BarangKeluarSearch extends BarangKeluar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_keluar'], 'integer'],
            [['kode_keluar', 'kategori_barang', 'tanggal_keluar', 'keterangan'], 'safe'],
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
        $query = BarangKeluar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_keluar' => $this->id_keluar,
            'tanggal_keluar' => $this->tanggal_keluar,
        ]);

        $query->andFilterWhere(['like', 'kode_keluar', $this->kode_keluar])
            ->andFilterWhere(['like', 'kategori_barang', $this->kategori_barang])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
