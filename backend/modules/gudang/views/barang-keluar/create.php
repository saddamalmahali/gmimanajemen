<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\BarangKeluar */

$this->title = 'Tambah Barang Keluar';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Barang Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-keluar-create">
	<div class='panel panel-primary'>
        <div class='panel-heading'><center><b><?= Html::encode($this->title) ?></b></center></div>
        <div class='panel-body'>
        	<?= $this->render('_form', [
		        'model' => $model,
		        'listKategori'=>$listKategori,
                'listModelDetileBarangKeluar'=> $listModelDetileBarangKeluar,
                'listBarang'=>$listBarang
		    ]) ?>
        </div>
    </div>

    

    

</div>
<?php 

    $this->registerJs("
        

        $('.dynamicform_wrapper').on('afterInsert', function(e, item) {
            console.log($(item));
            $('tr td select').change(function(e){
                
                $.get({
                    'url':'http://localhost/gmimanajemen/backend/web/index.php/gudang/barang-keluar/get-barang', 
                    'data':{ 'id' : $(this).val()}, 
                    'dataType':'json'
                }).done(function(data){
                    console.log(data.nama_barang);
                    $(e.target).parent().parent().next().find('input:text').val(data.nama_barang);
                    
                });
            });
        });

    $('tr td select').change(function(e){
                
        $.get({
            'url':'http://localhost/gmimanajemen/backend/web/index.php/gudang/barang-keluar/get-barang', 
            'data':{ 'id' : $(this).val()}, 
            'dataType':'json'
        }).done(function(data){
            console.log(data.nama_barang);
            $(e.target).parent().parent().next().find('input:text').val(data.nama_barang);
                    
        });
    });
        
    ");
?>
