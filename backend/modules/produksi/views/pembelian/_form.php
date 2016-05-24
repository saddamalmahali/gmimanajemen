<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Pembelian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembelian-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form', 'enableAjaxValidation'=>true]); ?>

    <?= $form->field($model, 'kode_pembelian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_pembelian')->dropDownList([ 'chemical' => 'Chemical', 'bahan_mentah' => 'Bahan mentah', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tanggal')->widget(DatePicker::classname(),[
    	'name' => 'check_issue_date', 
	    'value' => date('m-d-y', strtotime('+2 days')),
	    'options' => ['placeholder' => 'Select issue date ...'],
	    'pluginOptions' => [
	    	'autoclose'=>true,
	        'format' => 'yyyy-mm-dd',
	        'todayHighlight' => true
	    ]
    ]) ?>

    <?= $form->field($model, 'kode_supplier')->widget(Select2::classname(), [
    	'data' => $listSupplier,
	    'options' => ['placeholder' => 'Pilih Supplier'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
    ]) ?>


 
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelDetilePembelian[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'nama_barang',
                    'kuantitas',
                    'harga',
                    
                ],
            ]); ?>

            <div class=""><!-- widgetContainer -->
            <?php foreach ($modelDetilePembelian as $i => $detilePembelian): ?>
                <div class="panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Address</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $detilePembelian->isNewRecord) {
                                echo Html::activeHiddenInput($detilePembelian, "[{$i}]id_detile_pembelian");
                            }
                        ?>
                        
                        <table class='container-items table table-bordered'>
                        	<thead>
                        		<tr>
                                    <th>Kode Barang</th>
                        			<th>Kuantitas</th>
                        			<th>Harga</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                        		<tr class='item'>
                        			<td><?= $form->field($detilePembelian, "[{$i}]kode_barang")->widget(Select2::classname(), [
                                            'data' => $listBarang,
                                            'options' => ['placeholder' => 'Pilih Barang'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ])->label(false) ?>
                                    </td>
                                   
                        			<td><?= $form->field($detilePembelian, "[{$i}]kuantitas")->textInput(['maxlength' => true])->label(false) ?></td>
                        			<td><?= $form->field($detilePembelian, "[{$i}]harga")->textInput(['maxlength' => true])->label(false) ?></td>
                        			<td><button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button></td>
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

<?php 
    $this->registerJs("


        ");
?>