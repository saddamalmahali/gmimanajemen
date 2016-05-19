<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\BarangKeluarMentah */
?>
<div class="barang-keluar-mentah-update">

    <?= $this->render('_form', [
        'model' => $model,
        'listBarang' => $listBarang,
    ]) ?>

</div>
