<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "about_company".
 *
 * @property int $id
 * @property string $title_uz
 * @property string $title_ru
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property CompanyHistory[] $companyHistories
 */
class AboutCompany extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                // Boshqa hech narsa kerak emas, avtomatik time() ishlatadi
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about_company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_uz', 'description_ru', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['title_uz', 'title_ru'], 'required'],
            [['description_uz', 'description_ru'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title_uz', 'title_ru'], 'string', 'max' => 255],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CompanyHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyHistories()
    {
        return $this->hasMany(CompanyHistory::class, ['company_id' => 'id']);
    }

}
