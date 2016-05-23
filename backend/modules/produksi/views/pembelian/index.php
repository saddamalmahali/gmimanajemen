<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\produksi\models\PembelianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Pembelian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembelian-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 
        Modal::begin([
            'id'=>'modal-pembelian',
            'headerOptions'=>['class'=>'bg-primary'],
            'size'=>'modal-md'
            
        ]);

            echo "<div id='content-dlg-pembelian'></div>";
        Modal::end();

    ?>


    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'toolbar'=> [
            ['content'=>
                
                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['value'=>Url::to(['/produksi/pembelian/create']),'class' => 'btn btn-primary btn_tambah'])
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {delete}'
            ],
        ],
    ]); ?>
</div>

<?php 

    $js= <<< JS
    $(".btn_tambah").click(function(){
        $('#modal-pembelian').find('.modal-header').html('<center><b><h4>Tambah Pembelian</h4></b></center>');
        $('#modal-pembelian').modal('show')
            .find('#content-dlg-pembelian').load($(this).attr('value'));

    });
JS;

    $this->registerJs($js); 

?>

