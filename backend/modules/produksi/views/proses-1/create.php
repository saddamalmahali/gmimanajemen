<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Proses1 */

$this->title = 'Create Proses1';
$this->params['breadcrumbs'][] = ['label' => 'Proses1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proses1-create">
	
			<?= $this->render('_form', [
				'model' => $model,
				'listKeluarBarang'=>$listKeluarBarang
			]) ?>
</div>
