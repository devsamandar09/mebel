<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

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
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }

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
            [['video', 'image', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['company_id'], 'required'],
            [['title_uz', 'title_ru'], 'string', 'max' => 255],
            [['description_uz', 'description_ru'], 'string'],
            [['company_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['video', 'image'], 'string', 'max' => 255],
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
            'video' => 'Video',
            'image' => 'Image',
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
            $uploadPath = Yii::getAlias('@frontend/web/uploads/production/images/');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Delete old image
            $this->deleteOldFile($this->image);

            $fileName = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $this->imageFile->extension;

            if ($this->imageFile->saveAs($uploadPath . $fileName)) {
                $this->image = '/uploads/production/images/' . $fileName;
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
            $uploadPath = Yii::getAlias('@frontend/web/uploads/production/videos/');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Delete old video
            $this->deleteOldFile($this->video);

            $fileName = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $this->videoFile->extension;

            if ($this->videoFile->saveAs($uploadPath . $fileName)) {
                $this->video = '/uploads/production/videos/' . $fileName;
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
