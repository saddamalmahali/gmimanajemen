<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\BarangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
	<div class='col-md-8'><?= $form->field($model, 'kode_barang')->textInput([
		
		'placeholder'=>'Cari Menurut Kode Barang'
		
	])->label(false) ?></div>
	<div class='col-md-2'><?= Html::submitButton("<span class='fa fa-search'></span>", ['class' => 'btn btn-primary']) ?></div>

    

    <?php ActiveForm::end(); ?>

</div>
