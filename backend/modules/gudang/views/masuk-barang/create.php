<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\MasukBarang */

$this->title = 'Tambah Barang';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Masuk Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masuk-barang-create">
	<div class='panel panel-primary'>
        <div class='panel-heading'><center><b><?= Html::encode($this->title) ?></b></center></div>
        <div class='panel-body'>
        	<?= $this->render('_form', [
		        'model' => $model,		        
                'pembelian'=>$pembelian,
		    ]) ?>
        </div>
    </div>
    

</div>
