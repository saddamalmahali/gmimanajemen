<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\produksi\models\Proses1 */

$this->title = 'Update Proses1: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proses1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proses1-update">

    

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
