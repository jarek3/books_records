<?php

namespace app\controllers;

use app\models\BooksHasAuthors;
use app\models\BooksHasAuthorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BooksHasAuthorsController implements the CRUD actions for BooksHasAuthors model.
 */
class BooksHasAuthorsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all BooksHasAuthors models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BooksHasAuthorsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BooksHasAuthors model.
     * @param int $books_id Books ID
     * @param int $authors_id Authors ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($books_id, $authors_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($books_id, $authors_id),
        ]);
    }

    /**
     * Creates a new BooksHasAuthors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BooksHasAuthors();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'books_id' => $model->books_id, 'authors_id' => $model->authors_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BooksHasAuthors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $books_id Books ID
     * @param int $authors_id Authors ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($books_id, $authors_id)
    {
        $model = $this->findModel($books_id, $authors_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'books_id' => $model->books_id, 'authors_id' => $model->authors_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BooksHasAuthors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $books_id Books ID
     * @param int $authors_id Authors ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($books_id, $authors_id)
    {
        $this->findModel($books_id, $authors_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BooksHasAuthors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $books_id Books ID
     * @param int $authors_id Authors ID
     * @return BooksHasAuthors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($books_id, $authors_id)
    {
        if (($model = BooksHasAuthors::findOne(['books_id' => $books_id, 'authors_id' => $authors_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
