<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Proses2 */
?>
<div class="proses2-update">

    <?= $this->render('_form_update', [
        'model' => $model,
        'list_barang_keluar'=>$list_barang_keluar,
        'detile_proses2'=>$detile_proses2,
    ]) ?>

</div>
