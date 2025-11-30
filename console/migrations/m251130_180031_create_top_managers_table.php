<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%top_managers}}`.
 */
class m251130_180031_create_top_managers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%top_managers}}', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'full_name' => $this->string()->notNull(),
            'position' => $this->string()->notNull(),
            'bio' => $this->text(),
        ]);
        $this->addForeignKey(
            'fk_top_managers_about_company',
            '{{%top_managers}}',
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
        $this->dropForeignKey('fk_top_managers_about_company', '{{%top_managers}}');

        $this->dropTable('{{%top_managers}}');
    }
}
