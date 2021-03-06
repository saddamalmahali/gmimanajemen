<?php

namespace app\modules\produksi\controllers;

use Yii;
use app\modules\produksi\models\Proses1;
use app\modules\produksi\models\DetileProses1;
use app\modules\gudang\models\MasukBarang;
use app\modules\produksi\models\Proses1Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * Proses1Controller implements the CRUD actions for Proses1 model.
 */
class Proses1Controller extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Proses1 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Proses1Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proses1 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $barangKeluarMentah = $model->getBarangKeluarMentah($model->id_mentahan);
        $masukBarang = $barangKeluarMentah->ambilDataMasukBarang($barangKeluarMentah->id_masuk_barang);
        $pembelian = $masukBarang->getIdPembelian()->one();
        $dataProvider = new ActiveDataProvider([
                'query'=>$model->getDetileProses1(),
                'pagination'=>[
                    'pageSize'=>5
                ]
            ]);
        return $this->render('view', [
            'model' => $model,
            'barangKeluarMentah'=>$barangKeluarMentah,
            'masukBarang'=>$masukBarang,
            'pembelian'=>$pembelian,
            'dataProvider'=>$dataProvider,
        ]);
    }

    /**
     * Creates a new Proses1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Proses1();
        $detile = new DetileProses1();
		$listKeluarBarang = $model->getListBarangKeluar();
        $listBarangKeluarMentah = $model->getListBarangKeluarMentah();

        if ($model->load(Yii::$app->request->post()) && $detile->load(Yii::$app->request->post())) {

            if($model->save(false)){
                $detile->tanggal = $model->tanggal;
                $detile->id_proses_1 = $model->id;
                $detile->keterangan = $model->keterangan;
                if($detile->save(false)){
                    Yii::$app->session->setFlash('success', 'Proses berhasil ditambahkan');
                    return $this->redirect('index');
                }else{
                    Yii::$app->session->setFlash('danger', 'Gagal Menambahkan data kedalam Detile Proses1');
                    return $this->redirect('index');
                }
            }else{
                Yii::$app->session->setFlash('danger', 'Gagal Menambahkan kedalam Proses1');
                return $this->redirect('index');
            }
			
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
				'listKeluarBarang'=>$listKeluarBarang,
                'listBarangKeluarMentah'=>$listBarangKeluarMentah,
                'detile'=>$detile
            ]);
        }
    }

    /**
     * Updates an existing Proses1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$listKeluarBarang = $model->getListBarangKeluar();

        if ($model->load(Yii::$app->request->post())) {
			if($model->save(false)){
				Yii::$app->session->setFlash('success', 'Proses dengan id='.$model->id.' telah selesai!');
				return $this->redirect('index');
			}
			
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Proses1 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Proses1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Proses1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proses1::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
