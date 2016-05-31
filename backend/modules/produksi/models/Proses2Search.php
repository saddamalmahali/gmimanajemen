<?php

namespace app\modules\produksi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\produksi\models\Proses2;

/**
 * Proses2Search represents the model behind the search form about `app\modules\produksi\models\Proses2`.
 */
class Proses2Search extends Proses2
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_proses_1', 'selesai'], 'integer'],
            [['kode_proses', 'tanggal', 'keterangan'], 'safe'],
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
        $query = Proses2::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_proses_1' => $this->id_proses_1,
            'tanggal' => $this->tanggal,
            'selesai' => $this->selesai,
        ]);

        $query->andFilterWhere(['like', 'kode_proses', $this->kode_proses])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
