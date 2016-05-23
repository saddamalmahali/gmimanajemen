<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\BarangKeluar */

$this->title = $model->id_keluar;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Keluar Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-keluar-view">

    

    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
                'hover'=>true,
                'mode'=>DetailView::MODE_VIEW,
                'panel'=>[
                    'heading'=>'Supplier # ' . $model->kode_keluar,
                    'type'=>DetailView::TYPE_INFO,                    
                ],
        'attributes' => [
            'id_keluar',
            'kode_keluar',
            'kategori_barang',
            'tanggal_keluar',
            'keterangan',
        ],
    ]) ?>

</div>
