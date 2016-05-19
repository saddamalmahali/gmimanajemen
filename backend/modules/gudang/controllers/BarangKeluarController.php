<?php

namespace app\modules\gudang\controllers;

use Yii;
use app\modules\gudang\models\BarangKeluar;
use app\modules\gudang\models\ModelGudang;
use app\modules\gudang\models\DetileBarangKeluar;
use app\modules\gudang\models\BarangKeluarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * BarangKeluarController implements the CRUD actions for BarangKeluar model.
 */
class BarangKeluarController extends Controller
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
     * Lists all BarangKeluar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BarangKeluarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BarangKeluar model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionGetBarang($id){
        $barangKeluar = new BarangKeluar;
        $barang = $barangKeluar->getBarang($id);
        return Json::encode($barang);
    }

    /**
     * Creates a new BarangKeluar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BarangKeluar();
        $list_kategori = $model->getListKategori();
        $listModelDetileBarangKeluar = [new DetileBarangKeluar()];
        $listBarang = new DetileBarangKeluar();
        $listBarang = $listBarang->getListBarang();

        if ($model->load(Yii::$app->request->post())) {
            $listModelDetileBarangKeluar = ModelGudang::createMultiple(DetileBarangKeluar::classname());
            ModelGudang::loadMultiple($listModelDetileBarangKeluar, Yii::$app->request->post());

            $valid = $model->validate();
            $valid = ModelGudang::validateMultiple($listModelDetileBarangKeluar) && $valid;

            if($valid){
                $transaction = \Yii::$app->db->beginTransaction();

                try{
                    if($flag = $model->save(false)){
                        foreach ($listModelDetileBarangKeluar as $detileBarangKeluar) {
                            $detileBarangKeluar->id_barang_keluar = $model->id_keluar;

                            if(!($flag = $detileBarangKeluar->save(false))){
                                $transaction->rollback();
                                break;
                            }
                        }
                    }

                    if($flag){
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', 'Data Barang Keluar berhasil tersimpan');
                        return $this->redirect('index');
                    }
                }catch(Exception $e){
                    $transaction->rollback();
                }
            }

        } 

            return $this->renderAjax('create', [
                'model' => $model,
                'listModelDetileBarangKeluar'=>empty($listModelDetileBarangKeluar) ? [new DetileBarangKeluar()] : $listModelDetileBarangKeluar,
                'listKategori'=>$list_kategori,
                'listBarang'=>$listBarang
            ]);
        
    }

    /**
     * Updates an existing BarangKeluar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_keluar]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BarangKeluar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if(!is_null($model)){
            $detile = $model->getDetileBarangKeluars()->all();
            if(DetileBarangKeluar::deleteAll(['id_barang_keluar'=>$model->id_keluar])){
                $model->delete();
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the BarangKeluar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BarangKeluar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BarangKeluar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
