<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_history".
 *
 * @property int $id
 * @property int $company_id
 * @property string $title_uz
 * @property string $title_ru
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property string|null $image
 * @property string|null $video
 * @property int $created_at
 * @property int $updated_at
 *
 * @property AboutCompany $company
 */
class CompanyHistory extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_uz', 'description_ru', 'image', 'video'], 'default', 'value' => null],
            [['company_id', 'title_uz', 'title_ru', 'created_at', 'updated_at'], 'required'],
            [['company_id', 'created_at', 'updated_at'], 'integer'],
            [['title_uz', 'title_ru', 'description_uz', 'description_ru', 'image', 'video'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => AboutCompany::class, 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'title_uz' => 'Title Uz',
            'title_ru' => 'Title Ru',
            'description_uz' => 'Description Uz',
            'description_ru' => 'Description Ru',
            'image' => 'Image',
            'video' => 'Video',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(AboutCompany::class, ['id' => 'company_id']);
    }

}
