<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BooksHasAuthors */

$this->title = Yii::t('app', 'Update Books Has Authors: {name}', [
    'name' => $model->books_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books Has Authors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->books_id, 'url' => ['view', 'books_id' => $model->books_id, 'authors_id' => $model->authors_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="books-has-authors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
