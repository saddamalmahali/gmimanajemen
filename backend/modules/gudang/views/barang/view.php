<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\Barang */

$this->title = $model->id_barang;
$this->params['breadcrumbs'][] = ['label' => 'Data Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_barang], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_barang], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'Supplier # ' . $model->kode_barang,
            'type'=>DetailView::TYPE_INFO,
        ],
        'attributes' => [
            //'id_barang',
            'id_satuan',
            'kode_barang',
            'nama_barang',
            'keterangan',
            'id_kategori',
        ],
    ]) ?>

</div>
