<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Proses2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proses2-form">

	<?php $form = ActiveForm::begin(); ?>

    <div class='container-fluid'>
    	<div class='col-md-12'>

    		<?= $form->field($model, 'status_update')->dropDownList(
    			[''=>'', 'selesai'=>"Selesai", 'tambah-barang'=>"Tambah Barang"], 
    			[
    				'id'=>'selectOption',
    				'placeholder'=>'Pilih Perubahan'
    			]
    		)->label(false); ?>
    		
    		<br />
    		<div class='selesai' style="display:none">
    			<?= $form->field($model, 'tanggal_selesai')->widget(DatePicker::classname(), [
    				'value'=> date('yyyy-mm-dm', strtotime('+2 days')),
					'options'=>['placeholder'=>'Pilih Tanggal'],
					'pluginOptions'=>[
						'autoclose'=>true,
						'format'=>'yyyy-mm-dd',
						'todayHighlight'=>true
					]
    			]) ?>

    			<?= $form->field($model, 'kuantitas')->textInput(['maxlength'=>true]) ?>

    			<?= $form->field($model, 'keterangan')->textArea(['rows' => 4]) ?>

		    	<?= $form->field($model, 'selesai')->checkbox() ?>
    		</div>

    		<div class="tambah-barang" style="display:none">
    			<?= $form->field($detile_proses2, 'kode_terima')->textInput(['maxlength'=>true]) ?>
	    		<?= $form->field($detile_proses2, 'id_keluar_barang')->widget(Select2::classname(), [
						'data'=>$list_barang_keluar,
						'options'=>['placeholder'=>'Pilih Nota Barang Keluar'],
						'pluginOptions'=>[
							'allowClear'=>true
						]
				]) ?>    			
    		</div>
    		

		  
			<?php if (!Yii::$app->request->isAjax){ ?>
			  	<div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>
			<?php } ?>
    	</div>
    <div>
    <?php ActiveForm::end(); ?>
</div>

<?php 
	$script = <<< JS

	var panelSelesai = $(".selesai");
	var panelTambah = $('.tambah-barang');

	$("#selectOption").on('change', function(){
		var optionVal = $("#selectOption").val();
		
		if(optionVal == 'selesai'){
			panelTambah.hide();
			panelSelesai.show(700);
		}else if(optionVal == 'tambah-barang'){
			panelSelesai.hide();
			panelTambah.show(700);

		}
	});
JS;
	
	$this->registerJs($script);
?>