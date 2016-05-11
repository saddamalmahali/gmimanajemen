<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

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
                        'value'=>$modelPembelian->kode_pembelian == "" ? "<span class='label label-warning'>".$modelPembelian->kode_pembelian."</span>" : "<span class='label label-warning'>".$modelPembelian->kode_pembelian."</span>"
                    ]
                ]
            ],

            'kode_pembelian',
            
            //'id_pembelian',
            //'tanggal_masuk',
            //'keterangan',
        ],
    ]) ?>

</div>