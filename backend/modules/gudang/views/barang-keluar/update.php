<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\BarangKeluar */

$this->title = 'Update Barang Keluar: ' . $model->id_keluar;
$this->params['breadcrumbs'][] = ['label' => 'Barang Keluars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_keluar, 'url' => ['view', 'id' => $model->id_keluar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barang-keluar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
