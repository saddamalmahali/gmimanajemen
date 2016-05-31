<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Proses2 */

?>
<div class="proses2-create">
    <?= $this->render('_form', [
        'model' => $model,
		'data_proses_1'=>$data_proses_1,
    ]) ?>
</div>
