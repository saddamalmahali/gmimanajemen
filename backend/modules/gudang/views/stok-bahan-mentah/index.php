<?php
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;	
?>

<div class='stok-bahan-kimia-index'>
	<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'striped' => true,
			'hover'=>true,
	        'panel'=>[
	            'type'=>GridView::TYPE_PRIMARY,
	            'heading'=>'<center><b>Daftar Stok Barang</b></center>',
	        ],
	        'columns'=>[
	        	['class' => 'yii\grid\SerialColumn'],
	        	//'id_masuk'
	        	'kode_pembelian',
	        	'kode_masuk',
	        	'nama',
	        	'kuantitas',
	        	'sisa',
	        ]
		])

	?>

</div>