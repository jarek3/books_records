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
     $this->execute("CREATE TABLE IF NOT EXISTS `books` (
     `id` int NOT NULL AUTO_INCREMENT,
     `title` VARCHAR(255) NOT NULL,
     `author` VARCHAR(255) NOT NULL,
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
     ENGINE=InnoDB;");

     $this->execute("CREATE TABLE IF NOT EXISTS `authors` (
     `id` int NOT NULL AUTO_INCREMENT,
     `name` VARCHAR(255) DEFAULT NULL,
     `surname` VARCHAR(255) DEFAULT NULL,
     PRIMARY KEY (`id`))
     ENGINE=InnoDB;");
                   
     $this->execute ("INSERT INTO `books` (`id`, `title`, `author`, `description`)
                     VALUES (1, 'Learn PHP 8', 'Steve Prettyman', 'In this book you will create a complete three-tier application using a natural process of building and testing modules within each tier.'),
                            (2, 'Jižní stezka Českem od východu k západu', 'Jan Hocek', 'Jižní stezka vede napříč celou zemí mezi nejzápadnějším a nejvýchodnějším bodem České republiky, prostupuje nádherné česko-slovenské pohraničí, vydává se přes jihomoravské vinohrady a svou pouť končí přechodem Šumavy a Českého lesa.'),
                            (3, 'Českem od severu k jihu', 'Jan Hocek', '600 km dlouhá trasa od našeho nejsevernějšího bodu po bod nejjižnější.')
                    ");
     
     $this->execute ("INSERT INTO `authors` (`id`, `name`, `surname`)
                     VALUES (1, 'Steve', 'Prettyman'),
                            (2, 'Jan', 'Hocek')
                    ");

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
