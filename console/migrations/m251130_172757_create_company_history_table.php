<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company_history}}`.
 */
class m251130_172757_create_company_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company_history}}', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'title_uz' => $this->string(255)->notNull(),
            'title_ru' => $this->string(255)->notNull(),
            'description_uz' => $this->string()->null(),
            'description_ru' => $this->string()->null(),
            'image' => $this->string(255)->null(),
            'video' => $this->string(255)->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk_about_company_history_company',
            '{{%company_history}}',
            'company_id',
            '{{%about_company}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_about_company_history_company', '{{%company_history}}');

        $this->dropTable('{{%company_history}}');
    }
}
