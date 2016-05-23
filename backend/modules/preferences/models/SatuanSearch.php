<?php

namespace app\modules\preferences\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\preferences\models\Satuan;

/**
 * SatuanSearch represents the model behind the search form about `app\modules\preferences\models\Satuan`.
 */
class SatuanSearch extends Satuan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_satuan'], 'integer'],
            [['nama_satuan', 'satuan', 'keterangan'], 'safe'],
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
        $query = Satuan::find();

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
            'id_satuan' => $this->id_satuan,
        ]);

        $query->andFilterWhere(['like', 'nama_satuan', $this->nama_satuan])
            ->andFilterWhere(['like', 'satuan', $this->satuan])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
