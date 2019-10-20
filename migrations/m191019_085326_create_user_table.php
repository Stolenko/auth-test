<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m191019_085326_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci;';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(64)->notNull(),
            'last_name' => $this->string(64)->notNull(),
            'gender' => $this->smallInteger()->notNull(),
            'birth_at' => $this->dateTime()->notNull(),
            'phone' => $this->string(16)->notNull(),
            'email' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),

            'created_at' => $this->dateTime()->defaultExpression('NOW()'),
            'updated_at' => $this->dateTime()->defaultExpression('NOW()'),

        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
