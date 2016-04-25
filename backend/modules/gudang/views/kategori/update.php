<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\gudang\models\Kategori */

$this->title = 'Rubah Kategori: ' . $model->id_kategori;
$this->params['breadcrumbs'][] = ['label' => 'Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kategori, 'url' => ['view', 'id' => $model->id_kategori]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-update">
	<div class='panel panel-primary'>
        <div class='panel-heading'><center><b><?= Html::encode($this->title) ?></b></center></div>
        <div class='panel-body'>
        	<?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
        </div>
    </div>
    <h1></h1>

    

</div>
