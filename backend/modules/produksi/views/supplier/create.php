<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Supplier */

$this->title = 'Tambah Supplier';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Supplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-create">
	<div class='panel panel-primary'>
        <div class='panel-heading'><center><b><?= Html::encode($this->title) ?></b></center></div>
        <div class='panel-body'>
        	<?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
        </div>
    </div>


    

</div>
