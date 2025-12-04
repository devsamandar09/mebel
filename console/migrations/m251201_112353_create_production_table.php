<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%production}}`.
 */
class m251201_112353_create_production_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%production}}', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'video' => $this->string(255)->null(),
            'image' => $this->string(255)->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk_production_about_company',
            '{{%production}}',
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
        $this->dropForeignKey('fk_production_volume_company', '{{%production_volume}}');

        $this->dropTable('{{%production}}');
    }
}
