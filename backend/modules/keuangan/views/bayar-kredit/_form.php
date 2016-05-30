<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\keuangan\models\BayarKredit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bayar-kredit-form">

    <?php $form = ActiveForm::begin([
		'enableAjaxValidation' => true,
	]); ?>

    <?= $form->field($model, 'kode_pembelian', ['enableAjaxValidation' => true])->widget(Select2::classname(), [
		'data'=>$listPembelian,
		'options'=>['placeholder'=>'Pilih Nota Pembelian'],
		'pluginOptions'=>[
			'autoClose'=>true,
			'allowClear'=>true
		],
	]) ?>

    <?= $form->field($model, 'tanggal', ['enableAjaxValidation' => true])->widget(DatePicker::classname(),[
		'value'=>date('yyyy-mm-dd', strtotime('+2 days')), 
		'options'=>['placeholder'=>'Pilih Tanggal'],
		'pluginOptions'=>[
			'todayHighlight'=>true,
			'format'=>'yyyy-mm-dd',
			'autoclose'=>true
		]
	]) ?>

    <?= $form->field($model, 'cicilan_ke', ['enableAjaxValidation' => true])->textInput() ?>
	
	<?= $form->field($model, 'jumlah_bayar', ['enableAjaxValidation' => true])->textInput() ?>

    <?= $form->field($model, 'keterangan', ['enableAjaxValidation' => true])->textArea(['rows' => 6]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
