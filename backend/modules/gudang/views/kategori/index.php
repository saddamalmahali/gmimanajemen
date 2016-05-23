<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\gudang\models\KategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Kategori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-index">
    <div class='panel panel-primary'>
        <div class='panel-heading'><center><b><?= Html::encode($this->title) ?></b></center></div>
        <div class='panel-body'>
            <p>
                <?= Html::a('Tambah Kategori', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id_kategori',
                    'nama_kategori',
                    'keterangan',  
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
    <h1></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
</div>
