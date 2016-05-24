<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Proses1 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Proses 1', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proses1-view">

    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
                'hover'=>true,
                'mode'=>DetailView::MODE_VIEW,
                'panel'=>[
                    'heading'=>'Detile Proses # ' . $model->kode_proses_1,
                    'type'=>DetailView::TYPE_INFO,
                ],
        'attributes' => [
            [
                'columns'=>[
                    [
                        'attribute'=>'kode_proses_1',
                        'valueColOptions'=>['style'=>'width:40%']
                    ], 
                    [
                        'attribute'=>'keterangan',
                        'valueColOptions'=>['style'=>'width:40%']
                    ],
                    
                ]
            ],
            [
                'columns'=>[
                    [
                        'attribute'=>'tanggal',
                        'valueColOptions'=>['style'=>'width:40%']
                    ], 
                    [
                        'attribute'=>'selesai',
                        'format'=>'raw',
                        'value'=>$model->selesai == 1 ? '<span class="label label-success">Sudah</span>' : '<span class="label label-danger">Belum</span>',
                        'valueColOptions'=>['style'=>'width:40%']
                    ],
                    
                ]
            ],
            
        ],
    ]) ?>

    <div class="panel panel-info">
        <div class="panel-heading"><center><b>Data Barang yang Diproses</b></center></div>
        <div class="panel-body">
            <table class='table table-border table-hover'>
                <tbody>
                    <tr>
                        <td width="20%">Kode Barang Keluar</td>
                        <td width="5%">:</td>
                        <td width="25%"><?= $barangKeluarMentah->kode_keluar; ?></td>
                        <td width="20%">Kuantitas</td>
                        <td width="5%">:</td>
                        <td width="25%"><?= $barangKeluarMentah->kuantitas; ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Supplier</td>
                        <td width="5%">:</td>
                        <td width="25%"><?= $pembelian->kode_supplier; ?></td>
                        <td width="20%">Tanggal Keluar Barang</td>
                        <td width="5%">:</td>
                        <td width="25%"><?= $barangKeluarMentah->tanggal_keluar; ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Nama Supplier</td>
                        <td width="5%">:</td>
                        <td width="25%"><?=  $pembelian->getKodeSupplier()->one()->nama; ?></td>
                        <td width="20%">Keterangan</td>
                        <td width="5%">:</td>
                        <td width="25%"><?= $barangKeluarMentah->keterangan; ?></td>
                    </tr>
                </tbody>

            </table>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,                
                'responsiveWrap'=>false,
				
                
                
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],
					[
						'class'=>'kartik\grid\ExpandRowColumn',
						'detailRowCssClass'=>GridView::TYPE_DEFAULT,
						'value'=>function($model, $key, $index, $column){
							return GridView::ROW_COLLAPSED;
						},
						'detail'=>function($model, $key, $index){
						   $barang_keluar = $model->getIdBarangKeluar()->one();
						   $sql = $barang_keluar->getDetileBarangKeluars();
						   

							$dataProvider = new ActiveDataProvider([
								'query' => $sql,
							]);

							return Yii::$app->controller->renderPartial('detile_barang_keluar', [
								
								'dataProvider'=>$dataProvider
							]);

						}
					],
                    'kode_terima',
                    //'id',
                    'tanggal',
                    'id_barang_keluar',
					[
						'label'=> "Jumlah",
						'value'=>function($model){
							$barang_keluar = $model->getIdBarangKeluar()->one();
							$sql = $barang_keluar->getDetileBarangKeluars()->sum('banyak');
							return $sql;
						}
					],
                    'keterangan'

                    
                ],
            ]); ?>
        </div>
    </div>

</div>
