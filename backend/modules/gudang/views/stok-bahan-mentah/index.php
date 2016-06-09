<?php
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;	

$this->title = "Daftar Stok Bahan Mentah";
?>

<div class='stok-bahan-kimia-index'>
	<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'striped' => true,
			'hover'=>true,
	        'panel'=>[
	            'type'=>GridView::TYPE_PRIMARY,
	            'heading'=>'<center><b>'.$this->title.'</b></center>',
	        ],
	        'columns'=>[
	        	['class' => 'yii\grid\SerialColumn'],
	        	//'id_masuk'
	        	[
	        		'attribute'=>'kode_pembelian',
	        		'options'=>[
	        			'width'=>'10%',

	        		],
	        		'hAlign'=>'center',
	        	],
	        	[
	        		'attribute'=>'kode_masuk',
	        		'options'=>[
	        			'width'=>'10%',

	        		],
	        		'hAlign'=>'center',
	        	],
	        	'nama',
	        	[
	        		'attribute'=>'kuantitas',
	        		'options'=>[
	        			'width'=>'10%',

	        		],
	        		'hAlign'=>'center',
	        	],
	        	[
	        		'attribute'=>'sisa',
	        		'options'=>[
	        			'width'=>'10%',

	        		],
	        		'hAlign'=>'center',
	        	],
	        ]
		])

	?>

</div>