<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Pembelian */

$this->title = 'Update Pembelian: ' . $model->id_pembelian;
$this->params['breadcrumbs'][] = ['label' => 'Pembelians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pembelian, 'url' => ['view', 'id' => $model->id_pembelian]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembelian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
