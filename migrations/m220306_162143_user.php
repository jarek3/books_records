<?php

use yii\db\Migration;

/**
 * Class m220313_162504_user
 */
class m220313_162504_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
     $this->execute ("CREATE TABLE IF NOT EXISTS `user`(
     `id` INT NOT NULL AUTO_INCREMENT,
     `email` VARCHAR(255) NOT NULL,
     `password` VARCHAR(255) NOT NULL,
     `authKey` VARCHAR(255) NULL,
     PRIMARY KEY (`id`),
     UNIQUE INDEX `email_UNIQUE` (`email` ASC))
     ENGINE = InnoDB;");
        
     $this->execute ("INSERT INTO `user` (`id`, `email`, `password`, `authKey`)
                    VALUES (1, `jarek.patrny@gmail.com`, `81fe8bfe87576c3ecb22426f8e57847382917acf`, ``);"
                    );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220313_162504_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220313_162504_user cannot be reverted.\n";

        return false;
    }
    */
}
