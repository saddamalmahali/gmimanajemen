<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\gudang\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-index">

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

            //'id_barang',
            [
                'attribute'=>'id_satuan',
                'format'=>'raw',
                'value'=>function($model){
                    $satuan = $model->getIdSatuan()->one();
                    return $satuan->nama_satuan;
                },
            ],
            'id_satuan',
            'kode_barang',
            'nama_barang',
            'keterangan',
            // 'id_kategori',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
