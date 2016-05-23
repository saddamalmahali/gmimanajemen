<?php

namespace app\modules\preferences\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\preferences\models\KonversiSatuan;

/**
 * KonversiSatuanSearch represents the model behind the search form about `app\modules\preferences\models\KonversiSatuan`.
 */
class KonversiSatuanSearch extends KonversiSatuan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_konversi', 'nilai', 'nilai2'], 'integer'],
            [['satuan', 'satuan2'], 'safe'],
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
        $query = KonversiSatuan::find();

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
            'id_konversi' => $this->id_konversi,
            'nilai' => $this->nilai,
            'nilai2' => $this->nilai2,
        ]);

        $query->andFilterWhere(['like', 'satuan', $this->satuan])
            ->andFilterWhere(['like', 'satuan2', $this->satuan2]);

        return $dataProvider;
    }
}
