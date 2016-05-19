<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\produksi\models\Proses1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Proses 1';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proses1-index">

<?php 
	Modal::begin([
		'id'=>'modal-proses',
		'headerOptions'=>['class'=>'bg-primary'],
		'size'=>'modal-md'
		
	]);

		echo "<div id='dialogProses'></div>";

	Modal::end();

?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		
		'responsiveWrap'=>false,
		'toolbar'=> [
            ['content'=>
                
                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['value'=>Url::to(['/produksi/proses-1/create']),'class' => 'btn btn-primary btn_tambah'])
            ],
            '{toggleData}',
        ],
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>'<center><b>'.Html::encode($this->title).'</b></center>',
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
			'kode_proses_1',
            //'id',
            [
				'attribute'=>'id_barang_keluar',
				'format'=>'raw',
				'value'=>function($model){
					$barang = $model->getIdBarangKeluar()->one();
					return $barang->kode_keluar;
				}
			],
            [
				'attribute'=>'tanggal',
				'width'=>'20%',
				'filterType'=>GridView::FILTER_DATE,
				'filterWidgetOptions'=>[
					'pluginOptions' => [
						'autoclose'=>true,
						'format' => 'yyyy-mm-dd',
						'todayHighlight' => true
					]
				]
			],
            [
				'attribute'=>'keterangan',
				
				'width'=>'20%',
			],
            [
				'class'=>'\kartik\grid\BooleanColumn',
				'attribute'=>'selesai',
				
			],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template'=>'{update} {view}',
				'buttons' => [
					'update'=>function ($url, $model) {
						if($model->selesai){
							return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value'=>Url::to(['/produksi/proses-1/update', 'id' => $model->id]), 'class' => 'btn btn-default btn-xs custom_button', 'disabled'=>true]);
						}else{
							return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value'=>Url::to(['/produksi/proses-1/update', 'id' => $model->id]), 'class' => 'btn btn-default btn-xs custom_button']);
						}
						
					},
				]
            ],
        ],
    ]); ?>
	
</div>
<?php 

$js= <<< JS
	$('.custom_button').click(function(){
		$('#modal-proses').find('.modal-header').html('<center><b><h4>Konfirmasi Penyelesaian Proses 1</h4></b></center>');
		$('#modal-proses').modal('show')
			.find('#dialogProses').load($(this).attr('value'));
	});
	
	$('.btn_tambah').click(function(){
		$('#modal-proses').find('.modal-header').html('<center><b>Tambah Proses</b></center>');
		$('#modal-proses').modal('show')
			.find('#dialogProses').load($(this).attr('value'));
	});
JS;
$this->registerJs($js);

?>
