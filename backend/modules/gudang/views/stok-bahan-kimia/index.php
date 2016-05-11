<?php
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;	
?>

<div class='stok-bahan-kimia-index'>
	<?= GridView::widget([
			'dataProvider' => $dataProvider,
			
	        'panel'=>[
	            'type'=>GridView::TYPE_PRIMARY,
	            'heading'=>'<center><b>Daftar Stok Barang</b></center>',
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
	        	'persediaan'
	        ]
		])

	?>

</div>