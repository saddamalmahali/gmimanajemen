<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\Kategori */

$this->title = $model->nama_kategori;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-view">
    <div class='panel panel-primary'>
        <div class='panel-heading'><center><b>Detile Kategori</b></center></div>
        <div class='panel-body'>
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id_kategori], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id_kategori], [
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
                    'nama_kategori',
                    'keterangan',
                    'id_kategori',
                ],
            ]) ?>
        </div>
    </div>
    <h1></h1>

    

</div>