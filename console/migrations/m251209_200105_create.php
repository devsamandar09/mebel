<?php

use yii\db\Migration;

class m251209_200105_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $tableName = '{{%production}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'title_uz', $this->string(255)->null());
        $this->addColumn($this->tableName, 'title_ru', $this->string(255)->null());
        $this->addColumn($this->tableName, 'description_uz', $this->text()->null());
        $this->addColumn($this->tableName, 'description_ru', $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'title_uz');
        $this->dropColumn($this->tableName, 'title_ru');
        $this->dropColumn($this->tableName, 'description_uz');
        $this->dropColumn($this->tableName, 'description_ru');
    }
}
