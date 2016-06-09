<?php

namespace app\modules\coba\controllers;

use Yii;
use app\modules\coba\models\Coba;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class PrintController extends Controller{

	public function actionIndex(){
		
		return $this->render('coba-print');
	}

}

