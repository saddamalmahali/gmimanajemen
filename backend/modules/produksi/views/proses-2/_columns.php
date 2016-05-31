<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_proses_1',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kode_proses',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tanggal',
    ],
    //[
    //    'class'=>'\kartik\grid\DataColumn',
    //    'attribute'=>'keterangan',
    //],
    [
        'class'=>'\kartik\grid\BooleanColumn',
        'attribute'=>'selesai',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'template'=>'{update} {view}',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'],

        'buttons'=>[
            'update'=>function ($url, $model, $key) {
                    $disabled = $model->selesai;
                    $options = [
                                    'role'=>'modal-remote',
                                    'title'=>'Update', 
                                    'data-toggle'=>'tooltip', 
                                    'style'=> $disabled == true ? 'display: none' : '',
                                ];
                        
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                        
                        
                    },

        ] 
    ],

];   