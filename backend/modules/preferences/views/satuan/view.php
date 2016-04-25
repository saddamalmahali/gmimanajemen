<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\preferences\models\Satuan */

$this->title = $model->id_satuan;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Satuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satuan-view">
    <div class='panel panel-primary'>
        <div class='panel-heading'><?= Html::encode($this->title) ?></div>
        <div class='panel-body'>
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id_satuan], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id_satuan], [
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
                    'id_satuan',
                    'nama_satuan',
                    'satuan',
                ],
            ]) ?>
        </div>
    </div>

    

</div>
