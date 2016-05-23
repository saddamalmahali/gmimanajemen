<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\MasukBarang */

$this->title = $model->kode_masuk;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Masuk Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masuk-barang-view">

    

    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
                'hover'=>true,
                'mode'=>DetailView::MODE_VIEW,
                'panel'=>[
                    'heading'=>'Supplier # ' . $model->kode_masuk,
                    'type'=>DetailView::TYPE_INFO,
                ],
        'attributes' => [
            //'id_masuk',
            'kode_masuk',
            
            'id_pembelian',
            'tanggal_masuk',
            'keterangan',
        ],
    ]) ?>

</div>
