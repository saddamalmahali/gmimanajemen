<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\preferences\models\Satuan */

$this->title = 'Tambah Satuan';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Satuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satuan-create">
	<div class='panel panel-primary'>
		<div class='panel-heading'><?= Html::encode($this->title) ?></div>
		<div class='panel-body'>
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

		</div>
	</div>


</div>
