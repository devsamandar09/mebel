<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m251201_181819_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'realitionship_public_uz' => $this->string()->notNull(),
            'realitionship_public_ru' => $this->string()->notNull(),
            'changes_uz' => $this->string()->notNull(),
            'changes_ru' => $this->string()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
