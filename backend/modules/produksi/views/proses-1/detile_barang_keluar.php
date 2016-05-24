<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\MasukBarang */


?>

<div class="detile-barang-keluar">

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'panel'=>[
			'type' => GridView::TYPE_SUCCESS,
			'heading'=>'<center><b>Detile Barang</b></center>'
		],
        'columns' => [
			'kode_barang',
            'nama_barang',
			'banyak'
        ],
    ]) ?>

    

    

</div>