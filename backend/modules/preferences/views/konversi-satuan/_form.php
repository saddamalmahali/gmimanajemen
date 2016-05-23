<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\preferences\models\KonversiSatuan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="konversi-satuan-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class='col-md-12'>
    	<div class='col-md-3'>
    		<?= $form->field($model, 'satuan')->widget(Select2::classname(), [
		    	'data' => $satuan,
			    'options' => ['placeholder' => 'Pilih Satuan'],
			    'pluginOptions' => [
			        'allowClear' => true
			    ],
		    ])->label(false) ?>
    	</div>
    	<div class='col-md-2'>
    		<?= $form->field($model, 'nilai')->textInput([
    			
			    'placeholder' => "Nilai 1",
    		])->label(false) ?>
    	</div>
    	<div class='col-md-1'>=</div>
    	<div class='col-md-3'>
    		<?= $form->field($model, 'satuan2')->widget(Select2::classname(), [
		    	'data' => $jenis_satuan,
			    'options' => ['placeholder' => 'Pilih Satuan'],
			    'pluginOptions' => [
			        'allowClear' => true
			    ],
		    ])->label(false) ?>
    	</div>
    	<div class='col-md-2'>
    		<?= $form->field($model, 'nilai2')->textInput([
    			'placeholder' => "Nilai 2",
    		])->label(false) ?>
    	</div>

    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
