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
	
	<?= $form->field($model, 'kode_proses_1')->textInput(['maxLength' => 10]) ?>
	
    <?= $form->field($model, 'id_barang_keluar')->widget(Select2::classname(), [
		'data' => $listKeluarBarang,
	    'options' => ['placeholder' => 'Pilih Nota Barang Keluar'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	]) ?>

    <?= $form->field($model, 'tanggal')->widget(DatePicker::classname(),[
    	'name' => 'check_issue_date', 
	    'value' => date('m-d-y', strtotime('+2 days')),
	    'options' => ['placeholder' => 'Pilih Tanggal'],
	    'pluginOptions' => [
	    	'autoclose'=>true,
	        'format' => 'yyyy-mm-dd',
	        'todayHighlight' => true
	    ]
    ]) ?>

    <?= $form->field($model, 'keterangan')->textArea(['rows' => 6]) ?>

    <?= $form->field($model, 'selesai')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
