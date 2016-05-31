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

    

    

    <?= $form->field($model, 'keterangan')->textArea(['rows' => 4]) ?>

    <?= $form->field($model, 'selesai')->checkbox() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>