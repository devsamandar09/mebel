<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title_uz
 * @property string $title_ru
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property string|null $image
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Products extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_uz', 'description_ru', 'image', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['category_id', 'title_uz', 'title_ru'], 'required'],
            [['category_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_ru', 'description_uz', 'description_ru', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
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
