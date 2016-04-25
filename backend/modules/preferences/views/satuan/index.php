<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\preferences\models\SatuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Satuan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satuan-index">
    <div class='panel panel-primary'>
        <div class='panel-heading'><?= Html::encode($this->title) ?></div>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class='panel-body'>
            <p>
                <?= Html::a('Create Satuan', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id_satuan',
                    'nama_satuan',
                    'satuan',
                    'keterangan',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
        
    </div>
</div>
