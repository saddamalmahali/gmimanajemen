<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Proses2 */
?>
<div class="proses2-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_proses_1',
            'kode_proses',
            'tanggal',
            'keterangan',
            'selesai',
        ],
    ]) ?>

</div>
