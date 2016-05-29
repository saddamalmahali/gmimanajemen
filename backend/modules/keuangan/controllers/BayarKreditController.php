<?php

namespace app\modules\keuangan\controllers;

use Yii;
use app\modules\keuangan\models\BayarKredit;
use app\modules\keuangan\models\StatusCicilanPembelian;
use app\modules\keuangan\models\BayarKreditSearch;
use app\modules\produksi\models\Pembelian;
use app\modules\produksi\models\DetilePembelian;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\db\Query;

/**
 * BayarKreditController implements the CRUD actions for BayarKredit model.
 */
class BayarKreditController extends Controller
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
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all BayarKredit models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new BayarKreditSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single BayarKredit model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "BayarKredit #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new BayarKredit model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new BayarKredit(); 
		$listPembelian = $model->getPembelianKredit();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new BayarKredit",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
						'listPembelian'=>$listPembelian,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) ){
				
				$jumlah_dibayar = BayarKredit::find()->where(['kode_pembelian'=>$model->kode_pembelian])->sum('jumlah_bayar');
				
				if(! is_null($jumlah_dibayar)){
					$jumlah_dibayar = $jumlah_dibayar + $model->jumlah_bayar;
					$pembelian = Pembelian::find()->where(['kode_pembelian'=>$model->kode_pembelian])->one();
					
					if(! is_null($pembelian)){
						$query = new Query();
						$query->select('dp.kuantitas, dp.harga')
								->from('pembelian p')
								->innerJoin('detile_pembelian dp', 'dp.id_pembelian=p.id_pembelian')
								->where(['p.kode_pembelian'=>$model->kode_pembelian]);
						
						$row = $query->one();
						
						$jumlah = $row['kuantitas']*$row['harga'];
						
						$total = $jumlah - $jumlah_dibayar;
						//Yii::$app->session->setFlash('success', 'total : '.$total);
						$status_cicilan = StatusCicilanPembelian::find()->where(['id_pembelian'=>$pembelian->id_pembelian])->one();
						if($total == 0){
							$status_cicilan->status = 1;
							$status_cicilan->save();
							$model->save();
						}else{
							$model->save();
						}
					}else{
						$model->save();
					}
				}else{
					$model->save();
				}
				
				//Yii::$app->session->setFlash('success', "Jumlah dibayar : ".$jumlah_dibayar);
				
				
				//Yii::$app->session->setFlash('success', "Pembelian : ".$pembelian->jenis_pembelian);
				
				
				
				
				
				//Yii::$app->session->setFlash('success', 'Jumlah Beban : '.$jumlah_beban);
				
				
				
				
				
				
				
				
                return $this->redirect(['index']);         
            }else{           
                return [
                    'title'=> "Create new BayarKredit",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
						'listPembelian'=>$listPembelian,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
					'listPembelian'=>$listPembelian,
                ]);
            }
        }
       
    }
	
	public function actionCekQuery(){
		$query = new Query();
		$query->select('dp.kuantitas, dp.harga')
				->from('pembelian p')
				->innerJoin('detile_pembelian dp', 'dp.id_pembelian=p.id_pembelian')
				->where(['p.kode_pembelian'=>'PB-0014'])
				
				;
		$row = $query->one();
		$jumlah = $row['kuantitas']*$row['harga'];
		return $jumlah;
	}

    /**
     * Updates an existing BayarKredit model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update BayarKredit #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "BayarKredit #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update BayarKredit #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing BayarKredit model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing BayarKredit model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the BayarKredit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BayarKredit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BayarKredit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
