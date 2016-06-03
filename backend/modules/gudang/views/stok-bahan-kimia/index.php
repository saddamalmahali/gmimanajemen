<?php
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;	
use yii\widgets\Pjax;

$this->title = "Daftar Stok Bahan Kimia";
?>

<div class='stok-bahan-kimia-index'>
	<?php Pjax::begin(); ?>
	<?= GridView::widget([
			'dataProvider' => $dataProvider,
	        'panel'=>[
	            'type'=>GridView::TYPE_PRIMARY,
	            'heading'=>'<center><b>Daftar Stok Barang</b></center>',
				'before'=>$this->render('_search', ['model' => $searchProvider]),
	        ],
	        'columns'=>[
	        	['class' => 'yii\grid\SerialColumn'],
	        	[
	        		'attribute'=>'kode_barang',
	        		'label'=>'Kode Barang'
	        	],
	        	[
	        		'attribute'=>'nama_barang',
	        		'label'=>'Nama Barang'
	        	],
	        	[
					'attribute'=>'persediaan',
					'label'=>'Stok Barang yang Tersedia',
					'format'=>'raw',
					'value'=> function($model){
						return $model['persediaan'] = 0 ? "<span class='bg-warning'>".$model['persediaan']."</span>" : $model['persediaan'];
					}
				]
	        ]
		])

	?>

	<?php Pjax::end(); ?>

</div>