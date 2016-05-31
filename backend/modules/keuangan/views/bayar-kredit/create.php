<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\keuangan\models\BayarKredit */

?>
<div class="bayar-kredit-create">
    <?= $this->render('_form', [
        'model' => $model,
		'listPembelian'=>$listPembelian,
    ]) ?>
</div>
