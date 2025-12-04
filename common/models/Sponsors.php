<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sponsors".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property string|null $logo
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Sponsors extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sponsors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_uz', 'description_ru', 'logo', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['name_uz', 'name_ru'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_uz', 'name_ru', 'description_uz', 'description_ru', 'logo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Name Uz',
            'name_ru' => 'Name Ru',
            'description_uz' => 'Description Uz',
            'description_ru' => 'Description Ru',
            'logo' => 'Logo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
