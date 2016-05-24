<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\Barang */

$this->title = 'Tambah Barang';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-create">

	
        	<?= $this->render('_form', [
		        'model' => $model,
		        'listSatuan'=>$listSatuan,
		        'listKategori'=>$listKategori,
		    ]) ?>

    
    

</div>
