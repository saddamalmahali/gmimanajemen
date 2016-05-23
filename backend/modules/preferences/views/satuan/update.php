<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\preferences\models\Satuan */

$this->title = 'Rubah Satuan: ' . $model->id_satuan;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Satuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_satuan, 'url' => ['view', 'id' => $model->id_satuan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="satuan-update">
	<div class='panel panel-primary'>
		<div class='panel-heading'><?= Html::encode($this->title) ?></div>
		<div class='panel-body'>
			<?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
	</div>    

</div>
