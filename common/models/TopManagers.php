<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "top_managers".
 *
 * @property int $id
 * @property int $company_id
 * @property string $full_name
 * @property string $position
 * @property string|null $bio
 *
 * @property AboutCompany $company
 */
class TopManagers extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'top_managers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bio'], 'default', 'value' => null],
            [['company_id', 'full_name', 'position'], 'required'],
            [['company_id'], 'integer'],
            [['bio'], 'string'],
            [['full_name', 'position'], 'string', 'max' => 255],
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
            'full_name' => 'Full Name',
            'position' => 'Position',
            'bio' => 'Bio',
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
