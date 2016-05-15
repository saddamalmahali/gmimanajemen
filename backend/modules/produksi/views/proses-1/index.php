<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\produksi\models\Proses1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Proses 1';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proses1-index">

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'toolbar'=> [
            ['content'=>
                
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success'])
            ],
            '{toggleData}',
        ],
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>'<center><b>'.Html::encode($this->title).'</b></center>',
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'id',
            'id_barang_keluar',
            'tanggal',
            'keterangan',
            [
				'class'=>'\kartik\grid\BooleanColumn',
				'attribute'=>'selesai',
				
			],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
