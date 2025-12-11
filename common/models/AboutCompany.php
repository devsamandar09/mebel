<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "about_company".
 *
 * @property int $id
 * @property string $title_uz
 * @property string $title_ru
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property string|null $image
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property CompanyHistory[] $companyHistories
 */
class AboutCompany extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
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
            [['title_uz', 'title_ru', 'image'], 'string', 'max' => 255],

            // File upload rule
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, webp', 'maxSize' => 1024 * 1024 * 2],
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
            'imageFile' => 'Rasm yuklash',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Upload image file
     */
    public function uploadImage()
    {
        if ($this->imageFile) {
            $uploadPath = Yii::getAlias('@frontend/web/uploads/about-company/');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Delete old image
            if ($this->image) {
                $oldFile = Yii::getAlias('@frontend/web') . $this->image;
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }

            $fileName = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $this->imageFile->extension;

            if ($this->imageFile->saveAs($uploadPath . $fileName)) {
                $this->image = '/uploads/about-company/' . $fileName;
                return true;
            }
        }
        return false;
    }

    /**
     * Delete image when model is deleted
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            if ($this->image) {
                $filePath = Yii::getAlias('@frontend/web') . $this->image;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            return true;
        }
        return false;
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