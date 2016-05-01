<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\produksi\models\PembelianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Pembelian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembelian-index">

    
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

            //'id_pembelian',
            [
                'attribute'=>'kode_pembelian',
                'format'=>'raw',
                'hAlign'=>GridView::ALIGN_CENTER,
                'value'=> function($data){
                    return $data->kode_pembelian;
                }
            ],//'kode_pembelian',
            'jenis_pembelian',
            'tanggal',
            'kode_supplier',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
