<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\gudang\models\BarangKeluarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Keluar Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-keluar-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 
        Modal::begin([
            'id'=>'modal-barang-keluar',
            'headerOptions'=>['class'=>'bg-primary'],
            'size'=>'modal-md'
            
        ]);

            echo "<div id='content-dlg-barang-keluar'></div>";
        Modal::end();

    ?>
    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'toolbar'=> [
            ['content'=>
                
                Html::button('<i class="glyphicon glyphicon-plus"></i>', 
                    [
                        'value'=>Url::to(['/gudang/barang-keluar/create']),
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

            // 'id_keluar',
            'kode_keluar',
            'kategori_barang',
            'tanggal_keluar',
            'keterangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php 

    $js= <<< JS
        $(".btn_tambah").click(function(){
            
            //console.log('btn_tambah di click');
            
            $('#modal-barang-keluar').find('.modal-header').html('<center><b><h4>Buat Nota Keluar Barang</h4></b></center>');
            $('#modal-barang-keluar').modal('show')
                .find('#content-dlg-barang-keluar').load($(this).attr('value'));
            
        });
JS;
    $this->registerJs($js);
?>