<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m251205_130047_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string()->notNull(),
            'title_ru' => $this->string()->notNull(),
            'description_uz' => $this->text()->notNull(),
            'description_ru' => $this->text()->notNull(),
            'image' => $this->string(255)->null(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),

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
