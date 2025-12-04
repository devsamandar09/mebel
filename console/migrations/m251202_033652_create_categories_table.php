<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m251202_033652_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title_uz' => $this->string()->notNull(),
            'title_ru' => $this->string()->notNull(),
            'description_uz' => $this->string(),
            'description_ru' => $this->string(),
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
        $this->dropTable('{{%categories}}');
    }
}
