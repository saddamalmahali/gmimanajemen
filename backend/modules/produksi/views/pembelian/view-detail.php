<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Pembelian */

$this->title = $model->kode_pembelian;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pembelian', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Detile Pembelian #'.$this->title;
?>
<div class="pembelian-view">


    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
                'hover'=>true,
                'mode'=>DetailView::MODE_VIEW,
                'panel'=>[
                    'heading'=>'Supplier # ' . $model->kode_pembelian,
                    'type'=>DetailView::TYPE_INFO,
                ],
        'attributes' => [
            //'id_pembelian',
            [
                'columns'=>[
                    [
                        'attribute'=>'kode_pembelian',
                        'label'=>'Kode Pembelian',
                        'format'=>'raw',
                        'valueColOptions'=>['style'=>'width:40%']
                    ],
                    [
                        'attribute'=>'jenis_pembelian',
                        'label'=>'Jenis Pembelian',
                        'format'=>'raw',
                        'valueColOptions'=>['style'=>'width:40%']
                    ]
                ]
                
            ],

            //'kode_pembelian',
            //'jenis_pembelian',
            [
                'columns'=>[
                    [
                        'attribute'=>'tanggal',
                        'format'=>'raw',
                        'valueColOptions'=>['style'=>'width:40%']
                    ],
                    [
                        'attribute'=>'kode_supplier',
                        'format'=>'raw',
                        'valueColOptions'=>['style'=>'width:40%']
                    ],
                ]
            ]
        ],
    ]) ?>

       
                <?= GridView::widget([
                    'dataProvider' => $detile,
                    'showPageSummary'=>true, 
                    'pjax'=>true,
                    'striped'=>false,
                    'hover'=>true,
                    'panel'=>[
                        'type'=>GridView::TYPE_PRIMARY,
                        'heading'=>'<center><b>Rincian Pembelian</b></center>',
                    ],

                    'columns' => [
                        ['class' => 'kartik\grid\SerialColumn'],

                        
                        [
                            'attribute'=>'nama_barang',
                            'pageSummary'=>'J U M L A H',
                        ],
                        [
                            'attribute'=>'kuantitas',
                            'pageSummary'=>true,
                            'pageSummaryFunc'=>GridView::F_SUM
                        ],
                        [
                            'attribute'=>'harga',
                            'group'=>true, 
                            'pageSummary'=>true,
                            'pageSummaryFunc'=>GridView::F_SUM

                        ],
                        [
                            'label'=>'Jumlah',
                            'format'=>['decimal', 0],
                            'value'=>function($model){
                                $jumlah = $model->kuantitas;
                                $harga = $model->harga;
                                $sub_total = $jumlah*$harga;

                                return $sub_total;
                            },
                            'pageSummary'=>true,
                            'pageSummaryFunc'=>GridView::F_SUM
                        ],
                        //['class' => 'kartik\grid\ActionColumn'],

                    ],

                    



                ]); ?>


</div>
