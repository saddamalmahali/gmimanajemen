<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\MasukBarang */

$this->title = 'Update Masuk Barang: ' . $model->id_masuk;
$this->params['breadcrumbs'][] = ['label' => 'Masuk Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_masuk, 'url' => ['view', 'id' => $model->id_masuk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masuk-barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
