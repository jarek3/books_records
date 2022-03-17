<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 *
 * @property Books[] $books
 * @property BooksHasAuthors[] $booksHasAuthors
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('modelBooks', 'ID'),
            'name' => Yii::t('modelBooks', 'Jméno'),
            'surname' => Yii::t('modelBooks', 'Příjmení'),
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['id' => 'books_id'])->viaTable('books_has_authors', ['authors_id' => 'id']);
    }

    /**
     * Gets query for [[BooksHasAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooksHasAuthors()
    {
        return $this->hasMany(BooksHasAuthors::className(), ['authors_id' => 'id']);
    }

    public static function getAll()
    {
        $all = Authors::find()->asArray()->all();
        $result = \yii\helpers\ArrayHelper::map($all, 'id', 'surname');
        return $result;
    }
}
