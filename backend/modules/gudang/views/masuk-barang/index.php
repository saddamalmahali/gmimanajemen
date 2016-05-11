<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\popover\PopoverX;
use app\modules\produksi\models\PembelianSearch;
use app\modules\produksi\models\Pembelian;
use app\modules\produksi\models\DetilePembelian;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\gudang\models\MasukBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Masuk Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masuk-barang-index">

    
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
            ['class' => 'kartik\grid\SerialColumn'],
            
            //'id_masuk',
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'value'=>function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function($model, $key, $index){
                   $modelp = $model->getIdPembelian()->one();
                   $sql = DetilePembelian::find()->where(['id_pembelian'=>$model->id_pembelian]);
                   

                    $dataProvider = new ActiveDataProvider([
                        'query' => $sql,
                    ]);

                    return Yii::$app->controller->renderPartial('detail-pembelian', [
                        'modelPembelian' => $modelp,
                        'dataProvider'=>$dataProvider
                    ]);

                }
            ],

            'kode_masuk',
            [
                'attribute'=>'id_pembelian',
                'label'=>'Kode Pembelian',
                'format'=>'raw',
                'value'=>function($model){

                    $pembelian = $model->getIdPembelian()->one();
                    //$url = Url::to(['/produksi/penjualan/view','id'=>$penjualan->id_penjualan]);
                    return $pembelian->id_pembelian;
                }
            ],
            //'id_pembelian',
            [
                'attribute'=>'tanggal_masuk',
                'format'=>'raw',

                'value'=> function($model){
                    return "<center><span class='label label-warning'>".$model->tanggal_masuk."</span></center>";
                },
            ],

            [
                'label'=>'Jumlah Barang',
                'value'=>function($model){

                    $pembelian = $model->getIdPembelian()->one();
                    $detilePembelian = $pembelian->getDetilePembelians()->sum('kuantitas');


                    return $detilePembelian;
                }
            ],

            [
                
                'label'=>'Total Pembelian',
                'value'=>function($model){

                    $pembelian = $model->getIdPembelian()->one();
                    $detilePembelian = $pembelian->getDetilePembelians()->sum('harga');


                    return $detilePembelian;
                }
            ],

            'keterangan',

            [

                'class' => 'kartik\grid\ActionColumn',
                'template'=>'{delete}'
            ],
        ],
    ]); ?>
</div>

<?php 

    
?>
