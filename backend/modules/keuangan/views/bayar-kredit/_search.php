<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\PembelianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembelian-search">
	<div class='col-md-6'>
		<?php $form = ActiveForm::begin([
			'action' => ['index'],
			'method' => 'get',
		]); ?>

		<?= $form->field($model, 'kode_pembelian') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
    

</div>
