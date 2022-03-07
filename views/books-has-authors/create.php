<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BooksHasAuthors */

$this->title = Yii::t('app', 'Create Books Has Authors');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books Has Authors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-has-authors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
