<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\preferences\models\KonversiSatuan */

$this->title = 'Update Konversi Satuan: ' . $model->id_konversi;
$this->params['breadcrumbs'][] = ['label' => 'Konversi Satuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_konversi, 'url' => ['view', 'id' => $model->id_konversi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="konversi-satuan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
