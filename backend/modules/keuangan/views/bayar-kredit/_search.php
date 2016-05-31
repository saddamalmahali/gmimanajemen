<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\PembelianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembelian-search">
	<div class='col-md-8'>
		
			<?php $form = ActiveForm::begin([
				'action' => ['index'],
				'method' => 'get',
			]); ?>
			<div class='col-md-10'>
				<?= $form->field($model, 'kode_pembelian')->textInput([
					'options'=>['placeholder'=>"Cari Data Menurut Kode Pembelian"],
				])->label(false) ?>
			</div>
			<div class='col-md-2'>
					<?= Html::submitButton('<span class="fa fa-search"></span>', ['class' => 'btn btn-primary']) ?>
			</div>
			

			

			<?php ActiveForm::end(); ?>
		
	</div>
    

</div>
