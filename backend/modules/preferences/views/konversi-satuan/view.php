<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\preferences\models\KonversiSatuan */

$this->title = $model->id_konversi;
$this->params['breadcrumbs'][] = ['label' => 'Konversi Satuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konversi-satuan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_konversi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_konversi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_konversi',
            'satuan',
            'nilai',
            'satuan2',
            'nilai2',
        ],
    ]) ?>

</div>
