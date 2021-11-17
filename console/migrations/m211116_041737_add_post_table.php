<?php

use yii\db\Migration;

/**
 * Class m211116_041737_add_post_table
 */
class m211116_041737_add_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'posted_by' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'body' => $this->string()->null(),
            'image' => $this->string()->null(),
            'status' => $this->integer()->null(),
            'slug' => $this->string()->null(),
            'created_at' => $this->integer()->null(),
            'updated_at' => $this->integer()->null(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211116_041737_add_post_table cannot be reverted.\n";

        return false;
    }
    */
}
