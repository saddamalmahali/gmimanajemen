<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\keuangan\models\BayarKredit */
?>
<div class="bayar-kredit-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kode_pembelian',
            'tanggal',
            'jumlah_bayar',
            'keterangan',
        ],
    ]) ?>

</div>
