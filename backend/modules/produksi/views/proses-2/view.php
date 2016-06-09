<?php

use kartik\detail\DetailView;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;

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
                    'heading'=>'Proses2 # ' . $model->kode_proses,
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
						'valueColOptions'=>['style'=>'width:40%'],
						'value'=> $model->getIdProses1()->one()->kode_proses_1,
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
						'attribute'=>'tanggal_selesai',
						'valueColOptions'=>['style'=>'width:40%']
					],
					[
						'attribute'=>'selesai',
						'valueColOptions'=>['style'=>'width:40%'],
						'format'=>'raw',
						'value'=> $model->selesai == 1 ? "<span class='label label-success'>selesai</span>": "<span class='label label-warning'>belum</span>"
					]
				]
			],
            
        ],
    ]) ?>
	
		<?= GridView::widget([
                    'dataProvider' => $detile,
                    'showPageSummary'=>true, 
                    'pjax'=>true,
                    'striped'=>false,
                    'hover'=>true,
                    'panel'=>[
                        'type'=>GridView::TYPE_PRIMARY,
                        'heading'=>'<center><b>Rincian Proses 2</b></center>',
                    ],

                    'columns' => [
                        ['class' => 'kartik\grid\SerialColumn'],
                        [
							'class'=>'kartik\grid\ExpandRowColumn',
							'detailRowCssClass'=>GridView::TYPE_DEFAULT,
							'value'=>function($model, $key, $index, $column){
								return GridView::ROW_COLLAPSED;
							},
							'detail'=>function($model, $key, $index){
							   $barang_keluar = $model->getIdKeluarBarang()->one();
							   $sql = $barang_keluar->getDetileBarangKeluars();
							   


								$dataProvider = new ActiveDataProvider([
									'query' => $sql,
								]);

								return Yii::$app->controller->renderPartial('detile_barang_keluar', [
									
									'dataProvider'=>$dataProvider
								]);

							}
						],
                        
                        [
                        	'attribute'=>'id_keluar_barang',
                        	'value'=>function($model){
                        		$barang_keluar = $model->getIdKeluarBarang()->one();
                        		return $barang_keluar->kode_keluar;
                        	}
                        ],
                        //'id_keluar_barang',
						'kode_terima',
						'tanggal',
						[
							'label'=> "Jumlah",
							'hAlign'=>'center',
							'value'=>function($model){
								$barang_keluar = $model->getIdKeluarBarang()->one();
								$sql = $barang_keluar->getDetileBarangKeluars()->sum('banyak');
								return $sql;
							}
						],
						'keterangan'
                    ],

                    



                ]); ?>
	

</div>
