<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m221206_135336_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(256),
            'description' => $this->string(256),
            'image' => $this->string(256),
            'date' => $this->date(),
            'viewed' => $this->integer(),
            'user_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'category_id',
            'post',
            'category_id',
            'category',
            'id'
        );

        $this->addForeignKey(
            'user_id',
            'post',
            'user_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
