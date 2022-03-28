<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property string|null $author
 * @property string|null $description
 * @property string|null $year_of_publication
 *
 * @property Authors[] $authors
 * @property BooksHasAuthors[] $booksHasAuthors
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['title', 'author'], 'string', 'max' => 255],
            [['year_of_publication'], 'date', 'format'=>'Y'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'author' => Yii::t('app', 'Author'),
            'description' => Yii::t('app', 'Description'),
            'year_of_publication' => Yii::t('app', 'Year_of_publication'),
        ];
    }

    /**
     * Gets query for [[Authors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Authors::className(), ['id' => 'authors_id'])->viaTable('books_has_authors', ['books_id' => 'id']);
    }

    /**
     * Gets query for [[BooksHasAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooksHasAuthors()
    {
        return $this->hasMany(BooksHasAuthors::className(), ['books_id' => 'id']);
    }

    public static function getAll()
    {
        $all = Books::find()->asArray()->all();
        $result = \yii\helpers\ArrayHelper::map($all, 'id', 'title');
        return $result;
    }
}
