<?php

use yii\db\Migration;

/**
 * Class m211116_031243_add_default_user
 */
class m211116_031243_add_default_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $time = time();
        $password_hash = Yii::$app->getSecurity()->generatePasswordHash('pass12345');
        $auth_key = Yii::$app->security->generateRandomString();
        $table = 'user';

        $sql = <<<SQL
        INSERT INTO {$table}
        (`username`, `email`,`password_hash`, `auth_key`, `created_at`, `updated_at`)
        VALUES
        ('admin', 'admin@yoursite.com',  '$password_hash', '$auth_key', {$time}, {$time})
SQL;
        Yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $table = $this->_user;
        $sql = <<<SQL
        SELECT id from {$table}
        where username='admin'
SQL;
        Yii::$app->db->createCommand($sql)->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211116_031243_add_default_user cannot be reverted.\n";

        return false;
    }
    */
}
