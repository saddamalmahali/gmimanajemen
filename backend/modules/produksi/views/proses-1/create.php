<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Proses1 */

$this->title = 'Create Proses1';
$this->params['breadcrumbs'][] = ['label' => 'Proses1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proses1-create">
	<div class='panel panel-primary'>
		<div class='panel-heading'><center><b><?= Html::encode($this->title) ?></b></center></div>
		<div class='panel-body'>
			<?= $this->render('_form', [
				'model' => $model,
				'listKeluarBarang'=>$listKeluarBarang
			]) ?>
		</div>
	</div>
    <h1></h1>

    

</div>
