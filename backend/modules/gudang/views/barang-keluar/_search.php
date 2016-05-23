<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\BarangKeluarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-keluar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_keluar') ?>

    <?= $form->field($model, 'kode_keluar') ?>

    <?= $form->field($model, 'kategori_barang') ?>

    <?= $form->field($model, 'tanggal_keluar') ?>

    <?= $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
