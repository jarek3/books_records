<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BooksHasAuthors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-has-authors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'books_id')->textInput() ?>

    <?= $form->field($model, 'authors_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
