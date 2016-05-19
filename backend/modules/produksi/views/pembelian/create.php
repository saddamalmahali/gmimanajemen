<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Pembelian */

$this->title = 'Tambah Pembelian';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pembelian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembelian-create">

	
        
        	<?= $this->render('_form', [
		        'model' => $model,
		        'listSupplier'=>$listSupplier,
		        'modelDetilePembelian'=>$modelDetilePembelian,
		        'listBarang' => $listBarang,
		    ]) ?>
        
    

    

</div>
