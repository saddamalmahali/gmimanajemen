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
class StokBahanKimiaController extends Controller
{
	public function actionIndex(){
		$sql="select b.id_barang, b.id_satuan, b.kode_barang, b.nama_barang, b.id_kategori, 

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

				where b.id_kategori='K-002'";

		$sqlDataProvider = new SqlDataProvider([
			'sql'=>$sql
		]);
		return $this->render('index', [
				'dataProvider'=>$sqlDataProvider,
			]);
	}
}