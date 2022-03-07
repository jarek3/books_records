<?php

use app\models\Authors;
use app\models\BooksHasAuthors;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Authors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Authors'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            ['label' => 'Surname',
                'headerOptions' => ['style' => 'min-width:90px'], //aby byly buttony v jedné řádce
                //'contentOptions' => ['style' => 'text-align:center;'], //aby byly buttony uprostřed
                'format' => 'raw', //kvůli target _blank
                'value'=> function($model)
                {
                    $url = \yii\helpers\Url::to(['books/index', 'BooksSearch[title]' => $model->id]);
                    $linkText = $model->surname;
                    $options = ['class' => 'btn btn-noPjax', 'target' => '_blank'];
                    return \yii\helpers\Html::a($linkText, $url, $options);
                }
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Authors $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
