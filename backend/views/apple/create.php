<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AppleList $model */

$this->title = 'Create Apple List';
$this->params['breadcrumbs'][] = ['label' => 'Apple Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apple-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
