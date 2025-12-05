<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title_uz
 * @property string $title_ru
 * @property string $description_uz
 * @property string $description_ru
 * @property string|null $image
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class News extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['title_uz', 'title_ru', 'description_uz', 'description_ru'], 'required'],
            [['description_uz', 'description_ru'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_ru', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_uz' => 'Title Uz',
            'title_ru' => 'Title Ru',
            'description_uz' => 'Description Uz',
            'description_ru' => 'Description Ru',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
