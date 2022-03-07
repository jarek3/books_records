<?php

use app\models\BooksHasAuthors;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksHasAuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Books Has Authors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-has-authors-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Books Has Authors'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'books_id',
            'authors_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BooksHasAuthors $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'books_id' => $model->books_id, 'authors_id' => $model->authors_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
