<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "production".
 *
 * @property int $id
 * @property int $company_id
 * @property string|null $video
 * @property string|null $image
 * @property int $created_at
 * @property int $updated_at
 *
 * @property AboutCompany $company
 */
class Production extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video', 'image'], 'default', 'value' => null],
            [['company_id', 'created_at', 'updated_at'], 'required'],
            [['company_id', 'created_at', 'updated_at'], 'integer'],
            [['video', 'image'], 'string', 'max' => 255],
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
            'video' => 'Video',
            'image' => 'Image',
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
