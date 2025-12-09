<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

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
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @var UploadedFile
     */
    public $videoFile;

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
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'title_uz', 'title_ru'], 'required'],
            [['company_id'], 'integer'],
            [['description_uz', 'description_ru'], 'string'],
            [['title_uz', 'title_ru'], 'string', 'max' => 255],
            [['image', 'video'], 'string', 'max' => 500],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => AboutCompany::class, 'targetAttribute' => ['company_id' => 'id']],

            // File upload rules
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, webp', 'maxSize' => 1024 * 1024 * 2],
            [['videoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'mp4, avi, mov, webm', 'maxSize' => 1024 * 1024 * 50],
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
            'imageFile' => 'Rasm yuklash',
            'videoFile' => 'Video yuklash',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Upload image file
     * @return bool
     */
    public function uploadImage()
    {
        if ($this->imageFile) {
            $uploadPath = Yii::getAlias('@frontend/web/uploads/company-history/images/');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Delete old image
            $this->deleteOldFile($this->image);

            $fileName = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $this->imageFile->extension;

            if ($this->imageFile->saveAs($uploadPath . $fileName)) {
                $this->image = '/uploads/company-history/images/' . $fileName;
                return true;
            }
        }
        return false;
    }

    /**
     * Upload video file
     * @return bool
     */
    public function uploadVideo()
    {
        if ($this->videoFile) {
            $uploadPath = Yii::getAlias('@frontend/web/uploads/company-history/videos/');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Delete old video
            $this->deleteOldFile($this->video);

            $fileName = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $this->videoFile->extension;

            if ($this->videoFile->saveAs($uploadPath . $fileName)) {
                $this->video = '/uploads/company-history/videos/' . $fileName;
                return true;
            }
        }
        return false;
    }

    /**
     * Delete old file
     */
    private function deleteOldFile($filePath)
    {
        if ($filePath) {
            $fullPath = Yii::getAlias('@frontend/web') . $filePath;
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        }
    }

    /**
     * Delete files when model is deleted
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $this->deleteOldFile($this->image);
            $this->deleteOldFile($this->video);
            return true;
        }
        return false;
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