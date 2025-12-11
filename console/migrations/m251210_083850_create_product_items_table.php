<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_items}}`.
 */
class m251210_083850_create_product_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_items}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'title_uz' => $this->string(255)->notNull(),
            'title_ru' => $this->string(255)->notNull(),
            'description_uz' => $this->text(),
            'description_ru' => $this->text(),
            'price' => $this->decimal(10, 2)->notNull(),
            'image' => $this->string(255),
            'image2' => $this->string(255),
            'image3' => $this->string(255),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Foreign key qo'shish
        $this->addForeignKey(
            'fk-product_items-product_id',
            '{{%product_items}}',
            'product_id',
            '{{%products}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // Index qo'shish (tezlik uchun)
        $this->createIndex(
            'idx-product_items-product_id',
            '{{%product_items}}',
            'product_id'
        );
    }

    public function safeDown()
    {
        // Foreign key o'chirish
        $this->dropForeignKey('fk-product_items-product_id', '{{%product_items}}');

        // Index o'chirish
        $this->dropIndex('idx-product_items-product_id', '{{%product_items}}');

        // Jadvalni o'chirish
        $this->dropTable('{{%product_items}}');
    }
}
