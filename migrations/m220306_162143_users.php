<?php

use yii\db\Migration;

/**
 * Class m220306_162143_users
 */
class m220306_162143_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(CREATE TABLE IF NOT EXISTS `user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
  ENGINE = InnoDB;
);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220306_162143_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220306_162143_users cannot be reverted.\n";

        return false;
    }
    */
}
