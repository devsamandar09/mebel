<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sponsors}}`.
 */
class m251201_180456_create_sponsors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sponsors}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string()->notNull(),
            'name_ru' => $this->string()->notNull(),
            'description_uz' => $this->string()->null(),
            'description_ru' => $this->string()->null(),
            'logo' => $this->string(255)->null(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sponsors}}');
    }
}
