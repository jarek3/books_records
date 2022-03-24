<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books_has_authors".
 *
 * @property int $books_id
 * @property int $authors_id
 *
 * @property Authors $authors
 * @property Books $books
 */
class BooksHasAuthors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books_has_authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['books_id', 'authors_id'], 'required'],
            [['books_id', 'authors_id'], 'integer'],
            [['books_id', 'authors_id'], 'unique', 'targetAttribute' => ['books_id', 'authors_id']],
            [['authors_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['authors_id' => 'id']],
            [['books_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['books_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'books_id' => Yii::t('app', 'Books ID'),
            'authors_id' => Yii::t('app', 'Authors ID'),
        ];
    }

    /**
     * Gets query for [[Authors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasOne(Authors::className(), ['id' => 'authors_id']);
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasOne(Books::className(), ['id' => 'books_id']);
    }
}
