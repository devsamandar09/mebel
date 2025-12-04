<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company_card}}`.
 */
class m251201_182300_create_company_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company_card}}', [
            'id' => $this->primaryKey(),
            'contacts' => $this->string()->notNull(),
            'address'=> $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'instagram_link' => $this->string()->null(),
            'facebook_link' => $this->string()->null(),
            'linkedin_link' => $this->string()->null(),
            'youtube_link' => $this->string()->null(),
            'Why_us_uz' => $this->string()->null(),
            'Why_us_ru' => $this->string()->null(),
            'regular_customers' => $this->string()->null(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%company_card}}');
    }
}
