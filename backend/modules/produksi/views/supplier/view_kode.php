<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Supplier */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Supplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-view">
    <div class='panel panel-primary'>
        <div class='panel-heading'><center><b><?= Html::encode($this->title) ?></b></center></div>
        <div class='panel-body'>
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id_supplier], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id_supplier], [
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
                    'heading'=>'Supplier # ' . $model->kode,
                    'type'=>DetailView::TYPE_INFO,
                ],
                
                'attributes' => [
                    //'id_supplier',
                    //'kode',
                    [
                        'columns'=> [
                                                        [
                                                            'attribute'=>'nama',
                                                            'label'=>'Nama Supplier',
                                                            'format'=>'raw',
                                                            'valueColOptions'=>['style'=>'width:40%']
                                                        ],
                                                        [
                                                            'attribute'=>'kode', 
                                                            'label'=>'Kode Supplier',
                                                            'format'=>'raw',
                                                            
                                                            'valueColOptions'=>['style'=>'width:40%']
                                                        ],
                                    ],
                    ],
                    //'nama', 
                    [
                        'columns'=>[
                             [
                                'attribute'=>'alamat',
                                'label'=>'Alamat Supplier',
                                'format'=>'raw',
                                'valueColOptions'=>['style'=>'width:40%']
                             ] ,
                             [
                                'attribute'=>'phone',
                                'label'=>'Nomor Kontak',
                                'format'=>'raw',
                                'valueColOptions'=>['style'=>'width:40%']
                             ]     
                        ],
                        
                    ], 
                    [
                        'columns'=>[
                             [
                                'attribute'=>'email',
                                'label'=>'Email',
                                'format'=>'email',
                                'valueColOptions'=>['style'=>'width:40%']
                             ] ,
                             [
                                'attribute'=>'npwp',
                                'label'=>'NPWP',
                                'format'=>'raw',
                                'valueColOptions'=>['style'=>'width:40%']
                             ]     
                        ],
                        
                    ],               
                    //'alamat',
                    //'phone',
                    //'email:email',
                    //'npwp',
                    'create_date',
                ],
            ]) ?>
        </div>
    </div>


    

</div>
