<?php

use kartik\detail\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Proses2 */
?>
<div class="proses2-view">
 
    <?= DetailView::widget([
        'model' => $model,
		'condensed'=>true,
                'hover'=>true,
                'mode'=>DetailView::MODE_VIEW,
                'panel'=>[
                    'heading'=>'Rincian Proses2 # ' . $model->kode_proses,
                    'headingOptions'=>[
                    	'template'=>'{title}'
                    ]
                ],
        'attributes' => [
            
			[
				'columns'=>[
					[
						'attribute'=>'id',
						'valueColOptions'=>['style'=>'width:40%']
					],
					[
						'attribute'=>'id_proses_1',
						'valueColOptions'=>['style'=>'width:40%']
					]
				]
			],
			[
				'columns'=>[
					[
						'attribute'=>'kode_proses',
						'valueColOptions'=>['style'=>'width:40%']
					],
					[
						'attribute'=>'tanggal',
						'valueColOptions'=>['style'=>'width:40%']
					]
				]
			],
			[
				'columns'=>[
					[
						'attribute'=>'keterangan',
						'valueColOptions'=>['style'=>'width:40%']
					],
					[
						'attribute'=>'selesai',
						'valueColOptions'=>['style'=>'width:40%']
					]
				]
			],
            
        ],
    ]) ?>
	
	<div class='col-md-12'>
		<?= GridView::widget([
                    'dataProvider' => $detile,
                    'showPageSummary'=>true, 
                    'pjax'=>true,
                    'striped'=>false,
                    'hover'=>true,
                    'panel'=>[
                        'type'=>GridView::TYPE_PRIMARY,
                        'heading'=>'<center><b>Rincian Pembelian</b></center>',
                    ],

                    'columns' => [
                        ['class' => 'kartik\grid\SerialColumn'],

                        
                        'id_keluar_barang',
						'kode_terima',
						'tanggal',
						'keterangan'
                    ],

                    



                ]); ?>
	</div>

</div>
