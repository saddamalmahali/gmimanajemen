<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\MasukBarang */


?>

<div class="masuk-barang-detail-pembelian">

    

    <?= DetailView::widget([
        'model' => $modelPembelian,
        'condensed'=>true,
                'hover'=>true,
                'mode'=>DetailView::MODE_VIEW,
                'panel'=>[
                    'heading'=>'Supplier # ' . $modelPembelian->kode_pembelian,
                    'type'=>DetailView::TYPE_WARNING,
                    'headingOptions'=>[
                        'template'=>'{title}'
                    ]
                    
                ],
        'attributes' => [
            //'id_masuk',
            [
                'columns'=>[
                    [
                        'attribute'=>'kode_pembelian',
                        'label'=>'kode_pembelian',
                        'format'=>'raw',
                        'value'=>$modelPembelian->kode_pembelian == "" ? "<span class='label label-warning'>".$modelPembelian->kode_pembelian."</span>" : "<span class='label label-warning'>".$modelPembelian->kode_pembelian."</span>",
                        'valueColOptions'=>['style'=>'width:40%']

                    ],
                    [
                        'attribute'=>'tanggal',
                        'label'=>'Tanggal Pembelian',
                        'format'=>'raw',
                        'value'=>$modelPembelian->tanggal,
                        'valueColOptions'=>['style'=>'width:40%']
                    ]
                ]
            ],
            [
                'columns'=>[
                    [
                        'attribute'=>'kode_supplier',
                        'label'=>'Supplier',
                        'format'=>'raw',
                        'value'=> "<a class='label label-success' href='".Url::to(['/produksi/supplier/view', 'id'=>$modelPembelian->getKodeSupplier()->one()->id_supplier])."'>#".$modelPembelian->kode_supplier."</a>",
                        'valueColOptions'=>['style'=>'width:40%']

                    ],
                    [
                        'attribute'=>'kode_supplier',
                        'label'=>'Nama Supplier',
                        'format'=>'raw',
                        'value'=> $modelPembelian->getKodeSupplier()->one()->nama,
                        'valueColOptions'=>['style'=>'width:40%']

                    ],
                ]
            ],
            [
                'attribute'=>'kode_supplier',
                'label'=>'Alamat',
                'format'=>'raw',
                'value'=> $modelPembelian->getKodeSupplier()->one()->alamat,
                'valueColOptions'=>['style'=>'width:80%']

            ],
            
            
            //'id_pembelian',
            //'tanggal_masuk',
            //'keterangan',
        ],
    ]) ?>

    

    <div class='row'>
        <div class='col-md-12'>
            <?= 
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'showPageSummary'=>true,
                 
                    'panel'=>[
                        'type'=>GridView::TYPE_PRIMARY,
                        'heading'=>'<center><b>'.Html::encode($this->title).'</b></center>',
                    ],

                    'floatHeader'=>true,
                    'columns' => [
                        ['class' => 'kartik\grid\SerialColumn'],
                        [
                            'attribute'=>'kode_barang',
                            'format'=>'raw',

                            'value'=>function($model){
                                 return "<center><span class='label label-warning'>".$model->kode_barang."</span></center>";
                            },
                            'pageSummary'=>'<center>Jumlah Pembelian</center>'
                        ],
                        'nama_barang',
                        'kuantitas',

                        [
                            'attribute'=>'harga',
                            'pageSummary'=>true,
                            'pageSummaryFunc'=>GridView::F_SUM
                        ],

                        
                        //'id_pembelian',
                                            
                    ],
                ])

            ?>
        </div>
    </div>

</div>