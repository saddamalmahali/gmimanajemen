<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\BarangKeluarMentah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-keluar-mentah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_keluar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_keluar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_masuk_barang')->textInput() ?>

    <?= $form->field($model, 'kuantitas')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
