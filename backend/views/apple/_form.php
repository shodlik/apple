<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AppleList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="apple-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_appearance')->textInput() ?>

    <?= $form->field($model, 'date_fall')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'eat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_delete')->textInput() ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
