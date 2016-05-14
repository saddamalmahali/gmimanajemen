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

    <h1></h1>

    

</div>
