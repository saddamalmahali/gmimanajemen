<?php

namespace app\modules\keuangan\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\keuangan\models\BayarKredit;

/**
 * BayarKreditSearch represents the model behind the search form about `app\modules\keuangan\models\BayarKredit`.
 */
class BayarKreditSearch extends BayarKredit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['kode_pembelian', 'tanggal', 'cicilan_ke', 'keterangan'], 'safe'],
            [['jumlah_bayar'], 'number'],
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
        $query = BayarKredit::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination'=>[
				'pageSize'=>10,
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
            'tanggal' => $this->tanggal,
			'cicilan_ke'=>$this->cicilan_ke,
            'jumlah_bayar' => $this->jumlah_bayar,
        ]);

        $query->andFilterWhere(['like', 'kode_pembelian', $this->kode_pembelian])
			->andFilterWhere(['like', 'cicilan_ke', $this->cicilan_ke])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);
		
		$query->orderBy(['cicilan_ke'=>'asc']);
        return $dataProvider;
    }
}
