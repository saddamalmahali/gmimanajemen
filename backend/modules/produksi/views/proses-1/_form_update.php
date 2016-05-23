<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Proses1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proses1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'selesai')->checkbox() ?>
	<?= $form->field($model, 'keterangan')->textArea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
