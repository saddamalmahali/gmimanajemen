<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\MasukBarang */

$this->title = 'Tambah Barang';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Masuk Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masuk-barang-create">
	
        	<?= $this->render('_form', [
		        'model' => $model,		        
                'pembelian'=>$pembelian,
		    ]) ?>

</div>
