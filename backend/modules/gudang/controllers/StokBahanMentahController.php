<?php

namespace app\modules\gudang\controllers;

use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;

/**
 * BarangController implements the CRUD actions for Barang model.
 */
class StokBahanMentahController extends Controller
{
	public function actionIndex(){
		$sql="select  mb.kode_masuk, mb.id_masuk, p.kode_pembelian, s.nama, dp.kuantitas,
					@sisa := dp.kuantitas - ifnull((select sum(bkm.kuantitas) from barang_keluar_mentah bkm where bkm.id_masuk_barang = mb.id_masuk), 0) 
				    as sisa
				from masuk_barang mb 
				inner join pembelian p on p.id_pembelian = mb.id_pembelian 
				join supplier s on s.kode = p.kode_supplier
				right join detile_pembelian dp on dp.id_pembelian = p.id_pembelian
				 right join barang b on b.kode_barang = dp.kode_barang
				join (select @sisa := 0) v
				where b.id_kategori like  'K-001' and  (dp.kuantitas - ifnull((select sum(bkm.kuantitas) from barang_keluar_mentah bkm where bkm.id_masuk_barang = mb.id_masuk), 0)) != 0";

		$sqlDataProvider = new SqlDataProvider([
			'sql'=>$sql,
		]);
		return $this->render('index', [
				'dataProvider'=>$sqlDataProvider,
			]);
	}
}