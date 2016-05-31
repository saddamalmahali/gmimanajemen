<?php

namespace app\modules\gudang\models;

use Yii;
use yii\base\Model;
use yii\data\SqlDataProvider;

/**
 * MasukBarangSearch represents the model behind the search form about `app\modules\gudang\models\MasukBarang`.
 */
class StokBahanKimiaSearch extends Model
{
    /**
     * @inheritdoc
     */
	public $id_barang;
	public $id_satuan;
	public $kode_barang;
	public $nama_barang;
	public $id_kategori;
	 
    public function rules()
    {
        return [
            [['id_barang', 'id_satuan', ], 'integer'],
            [['kode_barang', 'nama_barang', 'id_kategori'], 'safe'],
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
        
		$sql="select id_barang, id_satuan, kode_barang, nama_barang, id_kategori, 

				@persediaan := (select sum(dp.kuantitas) from detile_pembelian dp 
								where dp.kode_barang=b.kode_barang and dp.id_pembelian in
								(select mb.id_pembelian from masuk_barang mb)
							   ) 
							   - (select sum(dbk.banyak) from detile_barang_keluar dbk
								where dbk.kode_barang=b.kode_barang and dbk.id_barang_keluar in
								(select bk.id_keluar from barang_keluar bk))
				as persediaan
				 from barang b
				 join (select @persediaan := 0) v

				where b.id_kategori='K-002' and kode_barang like :kode_barang order by b.id_barang asc";
		$count = Yii::$app->db->createCommand("
			select COUNT(*) 

				 from barang b

				where b.id_kategori=:kategori
		", [':kategori' => 'K-002'])->queryScalar();
		
		
		$sqlDataProvider = new SqlDataProvider([
			'sql'=>$sql,
			'totalCount'=>$count,  
			'pagination'=>[
                'pageSize'=>5
            ]
		]);
		
        // add conditions that should always apply here
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $sqlDataProvider;
        }

        // grid filtering conditions
			$sqlDataProvider->params = [
				':kode_barang' => $this->kode_barang."%",
			];
		
        return $sqlDataProvider;
    }
}
