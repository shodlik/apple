<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AppleList $model */

$this->title = 'Update Apple List: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apple Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apple-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
