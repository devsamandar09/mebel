<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%about_company}}`.
 */
class m251130_172502_create_about_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%about_company}}', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string()->notNull(),
            'title_ru' => $this->string()->notNull(),
            'description_uz' => $this->text(),
            'description_ru' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%about_company}}');
    }
}
