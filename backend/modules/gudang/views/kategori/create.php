<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\Kategori */

$this->title = 'Tambah Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-create">
	<div class='panel panel-primary'>
		<div class='panel-heading'><center><b><?= Html::encode($this->title) ?></b></center></div>

		<div class='panel-body'>
			<?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>	
		</div>

	</div>

    

</div>
