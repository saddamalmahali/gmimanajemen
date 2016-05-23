<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\BarangKeluarMentah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-keluar-mentah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_keluar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_keluar')->widget(DatePicker::classname(),[

        'name' => 'check_issue_date', 
        'value' => date('m-d-y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Pilih Tanggal ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]) ?>

    <?= $form->field($model, 'id_masuk_barang')->widget(Select2::classname(), [
                                            'id'=>'masuk_barang',
                                            'data' => $listBarang,
                                            'options' => ['placeholder' => 'Pilih Pembelian'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]) ?>

    <?= $form->field($model, 'kuantitas')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

<?php 
    $js = <<< JS
    $("#barang-keluar-mentah-input").addClass('form-control');
JS;
    $this->registerJs($js);
?>