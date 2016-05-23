<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\MasukBarang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="masuk-barang-form">
	

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_masuk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pembelian')->widget(Select2::classname(), [
                                            'data' => $pembelian,
                                            'options' => ['placeholder' => 'Pilih Pembelian'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]) ?>

    <?= $form->field($model, 'tanggal_masuk')->widget(DatePicker::classname(),[
        'name' => 'check_issue_date', 
        'value' => date('m-d-y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Pilih Tanggal ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]) ?>

    <?= $form->field($model, 'keterangan')->textArea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
