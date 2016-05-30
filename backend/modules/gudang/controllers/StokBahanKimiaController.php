<?php

namespace app\modules\gudang\controllers;

use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;
use app\modules\gudang\models\StokBahanKimiaSearch;



/**
 * BarangController implements the CRUD actions for Barang model.
 */
class StokBahanKimiaController extends Controller
{
	public function actionIndex(){
		$search = new StokBahanKimiaSearch();
		$sqlDataProvider = $search->search(Yii::$app->request->queryParams);
		return $this->render('index', [
				'dataProvider'=>$sqlDataProvider,
				'searchProvider'=>$search
			]);
	}
}