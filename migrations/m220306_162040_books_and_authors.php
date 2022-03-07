<?php

use yii\db\Migration;

/**
 * Class m220306_162040_books_and_authors
 */
class m220306_162040_books_and_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $this->execute(CREATE TABLE IF NOT EXISTS `books` (
    `id` int NOT NULL, AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
        PRIMARY KEY (`id`),
  INDEX `fk_books_has_authors_authors1_idx` (`authors_id` ASC),
  INDEX `fk_books_has_authors_books_idx` (`books_id` ASC),
  CONSTRAINT `fk_books_has_authors_authors1`
        FOREIGN KEY (`authors_id`)
        REFERENCES `authors` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
CONSTRAINT `fk_books_has_authors_books`
        FOREIGN KEY (`books_id`)
        REFERENCES `books` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
 ENGINE=InnoDB;
    );

    $this->execute(CREATE TABLE IF NOT EXISTS `authors` (
    `id` int NOT NULL,AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`id`))
 ENGINE=InnoDB;
);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220306_162040_books_and_authors cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220306_162040_books_and_authors cannot be reverted.\n";

        return false;
    }
    */
}
