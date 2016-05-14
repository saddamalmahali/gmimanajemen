<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\BarangKeluar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-keluar-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>

    <?= $form->field($model, 'kode_keluar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kategori_barang')->widget(Select2::classname(), [
                                            'data' => $listKategori,
                                            'options' => ['placeholder' => 'Pilih Kategori Barang'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]) ?>

    <?= $form->field($model, 'tanggal_keluar')->widget(DatePicker::classname(),[
        'name' => 'check_issue_date', 
        'value' => date('m-d-y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Pilih Tanggal ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]) ?>

    <?= $form->field($model, 'keterangan')->textArea(['rows' => 6]) ?>

    <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $listModelDetileBarangKeluar[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'nama_barang',
                    'kuantitas',
                    'harga',
                    
                ],
            ]); ?>

            <div class=""><!-- widgetContainer -->
            <?php foreach ($listModelDetileBarangKeluar as $i =>$detileBarangKeluar): ?>
                <div class="panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Detile Pengeluaran</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $detileBarangKeluar->isNewRecord) {
                                echo Html::activeHiddenInput($detilePembelian, "[{$i}]id");
                            }
                        ?>
                        
                        <table class='container-items table table-bordered'>
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Banyak</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class='item'>
                                    <td><?= $form->field($detileBarangKeluar, "[{$i}]kode_barang")->widget(Select2::classname(), [
                                            'data' => $listBarang,
                                            'options' => ['placeholder' => 'Pilih Barang'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ])->label(false) ?>
                                    </td>
                                    
                                    <td><?= $form->field($detileBarangKeluar, "[{$i}]nama_barang")->textInput(['id'=>'nama_barang_text','maxlength' => true])->label(false) ?></td>
                                    <td><?= $form->field($detileBarangKeluar, "[{$i}]banyak")->textInput(['maxlength' => true])->label(false) ?></td>
                                    <td><center><button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button></center></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
