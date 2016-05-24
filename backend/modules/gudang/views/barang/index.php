<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\gudang\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php 
        Modal::begin([
                'id'=>'modal-barang',
                'headerOptions'=>['class'=>'bg-primary'],
                'size'=>'modal-md'
            ]);

        echo "<div id='modal-barang-content'></div>";

        Modal::end();
    ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'toolbar'=> [
            ['content'=>
                
                Html::button('<i class="glyphicon glyphicon-plus"></i>', 
                    [
                        'value'=>Url::to(['/gudang/barang/create']),
                        'class' => 'btn btn-primary btn_tambah'
                    ])
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
            
            'id_satuan',
            'kode_barang',
            'nama_barang',
            [
                'attribute'=>'id_satuan',
                'format'=>'raw',
                'value'=>function($model){
                    $satuan = $model->getIdSatuan()->one();
                    return $satuan->nama_satuan;
                },
            ],
            'keterangan',
            // 'id_kategori',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

$js = <<< JS
    $('.btn_tambah').click(function(e){
        e.preventDefault();

        $('#modal-barang').find('.modal-header').html('<center><b><h4>Tambah Barang</h4></b></center>');
        $('#modal-barang').modal('show')
        .find('#modal-barang-content')
        .load($(this).attr('value'));

    })
JS;

$this->registerJs($js);

?>