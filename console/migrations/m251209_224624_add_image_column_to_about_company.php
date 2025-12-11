<?php

use yii\db\Migration;

class m251209_224624_add_image_column_to_about_company extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%about_company}}', 'image', $this->string(500)->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%about_company}}', 'image');
    }
}
