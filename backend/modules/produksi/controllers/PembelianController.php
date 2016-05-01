<?php

namespace app\modules\produksi\controllers;

use Yii;
use app\modules\produksi\models\Pembelian;
use app\modules\produksi\models\ModelProduksi;
use app\modules\produksi\models\DetilePembelian;
use app\modules\produksi\models\PembelianDetilePembelianLink;
use app\modules\produksi\models\PembelianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * PembelianController implements the CRUD actions for Pembelian model.
 */
class PembelianController extends Controller
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
     * Lists all Pembelian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PembelianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pembelian model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionBarang(){
        $model = new Pembelian();
        $listBarang = $model->getListBarang();
        return Json::encode($listBarang);
    }

    /**
     * Creates a new Pembelian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pembelian();
        $modelDetilePembelian = [new DetilePembelian()];
        $listSupplier = $model->getListSupplier();
        $listBarang = $model->getListBarang();



        if ($model->load(Yii::$app->request->post())) {
            $modelDetilePembelian = ModelProduksi::createMultiple(DetilePembelian::classname());
            ModelProduksi::loadMultiple($modelDetilePembelian, Yii::$app->request->post());


            //validasi semua model
            $valid = $model->validate();
            $valid = ModelProduksi::validateMultiple($modelDetilePembelian) && $valid;

            if($valid){
                $transaction = \Yii::$app->db->beginTransaction();

                try{
                    if($flag = $model->save(false)){
                        foreach ($modelDetilePembelian as $detilePembelian) {
                            
                            if($flag = $detilePembelian->save(false)){
                                $link = new PembelianDetilePembelianLink();
                                $link->id_pembelian = $model->id_pembelian;
                                $link->id_detile_pembelian = $detilePembelian->id_detile_pembelian;

                                $link->save(false);
                            }
                        }
                    }

                    if($flag){
                        $transaction->commit();
                        return $this->redirect(['view', 'id'=>$model->id_pembelian]);
                    }
                }catch(Exception $e){
                    $transaction->rollBack();
                }
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id_pembelian]);
        } 


        return $this->render('create', [
                'model' => $model,
                'listSupplier' => $listSupplier,
                'modelDetilePembelian' => empty($modelDetilePembelian) ? [new DetilePembelian()] : $modelDetilePembelian,
                'listBarang' => $listBarang,
        ]);
    }

    /**
     * Updates an existing Pembelian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pembelian]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pembelian model.
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
     * Finds the Pembelian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pembelian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pembelian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
