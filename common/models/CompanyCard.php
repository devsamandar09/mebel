<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_card".
 *
 * @property int $id
 * @property string $contacts
 * @property string $address
 * @property string $email
 * @property string|null $instagram_link
 * @property string|null $facebook_link
 * @property string|null $linkedin_link
 * @property string|null $youtube_link
 * @property string|null $Why_us_uz
 * @property string|null $Why_us_ru
 * @property string|null $regular_customers
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class CompanyCard extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['instagram_link', 'facebook_link', 'linkedin_link', 'youtube_link', 'Why_us_uz', 'Why_us_ru', 'regular_customers', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['contacts', 'address', 'email'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['contacts', 'address', 'email', 'instagram_link', 'facebook_link', 'linkedin_link', 'youtube_link', 'Why_us_uz', 'Why_us_ru', 'regular_customers'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contacts' => 'Contacts',
            'address' => 'Address',
            'email' => 'Email',
            'instagram_link' => 'Instagram Link',
            'facebook_link' => 'Facebook Link',
            'linkedin_link' => 'Linkedin Link',
            'youtube_link' => 'Youtube Link',
            'Why_us_uz' => 'Why Us Uz',
            'Why_us_ru' => 'Why Us Ru',
            'regular_customers' => 'Regular Customers',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
