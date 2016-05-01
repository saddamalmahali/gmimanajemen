<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Pembelian */

$this->title = 'Tambah Pembelian';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pembelian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembelian-create">

	<div class='panel panel-primary'>
        <div class='panel-heading'><center><b><?= Html::encode($this->title) ?></b></center></div>
        <div class='panel-body'>
        	<?= $this->render('_form', [
		        'model' => $model,
		        'listSupplier'=>$listSupplier,
		        'modelDetilePembelian'=>$modelDetilePembelian,
		        'listBarang' => $listBarang,
		    ]) ?>
        </div>
    </div>
    

    

</div>
