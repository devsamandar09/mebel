<?php

use yii\db\Migration;

class m251210_041355_add_image_column_to_top_managers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%top_managers}}', 'image', $this->string(500)->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%top_managers}}', 'image');
    }
}
