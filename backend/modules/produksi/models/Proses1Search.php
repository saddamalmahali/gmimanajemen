<?php

namespace app\modules\produksi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\produksi\models\Proses1;

/**
 * Proses1Search represents the model behind the search form about `app\modules\produksi\models\Proses1`.
 */
class Proses1Search extends Proses1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_barang_keluar', 'selesai'], 'integer'],
            [['tanggal', 'keterangan'], 'safe'],
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
        $query = Proses1::find();

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
            'id' => $this->id,
            'id_barang_keluar' => $this->id_barang_keluar,
            'tanggal' => $this->tanggal,
            'selesai' => $this->selesai,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
