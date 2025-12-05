<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m251204_170732_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
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
        $this->addForeignKey(
            'fk_products_category',
            '{{%products}}',
            'category_id',
            '{{%categories}}',
            '587id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_products_category', '{{%products}}');
        $this->dropTable('{{%products}}');
    }
}
