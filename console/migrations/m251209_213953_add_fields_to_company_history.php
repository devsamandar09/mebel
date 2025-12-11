<?php

use yii\db\Migration;

class m251209_213953_add_fields_to_company_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Add body fields
        $this->addColumn('{{%company_history}}', 'body_uz', $this->text()->after('description_ru'));
        $this->addColumn('{{%company_history}}', 'body_ru', $this->text()->after('body_uz'));

        // Add image fields
        $this->addColumn('{{%company_history}}', 'image2', $this->string(500)->after('image'));
        $this->addColumn('{{%company_history}}', 'image3', $this->string(500)->after('image2'));
        $this->addColumn('{{%company_history}}', 'image4', $this->string(500)->after('image3'));
        $this->addColumn('{{%company_history}}', 'image5', $this->string(500)->after('image4'));

        // Add video fields
        $this->addColumn('{{%company_history}}', 'video2', $this->string(500)->after('video'));
        $this->addColumn('{{%company_history}}', 'video3', $this->string(500)->after('video2'));
        $this->addColumn('{{%company_history}}', 'video4', $this->string(500)->after('video3'));
        $this->addColumn('{{%company_history}}', 'video5', $this->string(500)->after('video4'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%company_history}}', 'body_uz');
        $this->dropColumn('{{%company_history}}', 'body_ru');

        $this->dropColumn('{{%company_history}}', 'image2');
        $this->dropColumn('{{%company_history}}', 'image3');
        $this->dropColumn('{{%company_history}}', 'image4');
        $this->dropColumn('{{%company_history}}', 'image5');

        $this->dropColumn('{{%company_history}}', 'video2');
        $this->dropColumn('{{%company_history}}', 'video3');
        $this->dropColumn('{{%company_history}}', 'video4');
        $this->dropColumn('{{%company_history}}', 'video5');
    }
}
