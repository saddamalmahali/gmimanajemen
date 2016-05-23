<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\preferences\models\KonversiSatuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Konversi Satuan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konversi-satuan-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'toolbar'=> [
            ['content'=>
                
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success'])
            ],
            '{toggleData}',
        ],
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>'<center><b>'.Html::encode($this->title).'</b></center>',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_konversi',
            [
                'attribute'=>'satuan',
                'value'=>function($model){
                    $konversi = $model;
                    $satuan = $konversi->getSatuan0()->one();
                    return $satuan->satuan;
                },
                'hAlign'=> GridView::ALIGN_CENTER,
            ],
            //'satuan',
            [
                'attribute'=>'nilai',
                'hAlign'=>GridView::ALIGN_CENTER,
            ],
            //'nilai',
            [
                'attribute'=>'satuan2',
                'hAlign'=>GridView::ALIGN_CENTER,
            ],
            //'satuan2',
            [
                'attribute'=>'nilai2',
                'hAlign'=>GridView::ALIGN_CENTER,
            ],
            //'nilai2',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=> '{delete}',
            ],
        ],
    ]); ?>
</div>
