<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\preferences\models\KonversiSatuan */

$this->title = 'Create Konversi Satuan';
$this->params['breadcrumbs'][] = ['label' => 'Konversi Satuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konversi-satuan-create">
	<div class='panel panel-primary'>
        <div class='panel-heading'><center><b><?= Html::encode($this->title) ?></b></center></div>
        <div class='panel-body'>
        	<?= $this->render('_form', [
		        'model' => $model,
		        'satuan'=> $satuan,
                'jenis_satuan'=> $jenis_satuan,
		    ]) ?>
        </div>
    </div>

    

</div>
