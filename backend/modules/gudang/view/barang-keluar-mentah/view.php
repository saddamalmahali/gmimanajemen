<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\BarangKeluarMentah */
?>
<div class="barang-keluar-mentah-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kode_keluar',
            'tanggal_keluar',
            'id_masuk_barang',
            'kuantitas',
            'keterangan',
        ],
    ]) ?>

</div>
