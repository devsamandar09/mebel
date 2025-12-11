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
 * @property string|null $body_uz
 * @property string|null $body_ru
 * @property string|null $image
 * @property string|null $image2
 * @property string|null $image3
 * @property string|null $image4
 * @property string|null $image5
 * @property string|null $video
 * @property string|null $video2
 * @property string|null $video3
 * @property string|null $video4
 * @property string|null $video5
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
    public $imageFile2;
    public $imageFile3;
    public $imageFile4;
    public $imageFile5;

    /**
     * @var UploadedFile
     */
    public $videoFile;
    public $videoFile2;
    public $videoFile3;
    public $videoFile4;
    public $videoFile5;

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
            [[ 'title_uz', 'title_ru'], 'required'],
            [['company_id'], 'safe'],
            [['description_uz', 'description_ru', 'body_uz', 'body_ru'], 'string'],
            [['title_uz', 'title_ru'], 'string', 'max' => 255],
            [['image', 'image2', 'image3', 'image4', 'image5', 'video', 'video2', 'video3', 'video4', 'video5'], 'string', 'max' => 500],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => AboutCompany::class, 'targetAttribute' => ['company_id' => 'id']],

            // File upload rules
            [['imageFile', 'imageFile2', 'imageFile3', 'imageFile4', 'imageFile5'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, webp', 'maxSize' => 1024 * 1024 * 2],
            [['videoFile', 'videoFile2', 'videoFile3', 'videoFile4', 'videoFile5'], 'file', 'skipOnEmpty' => true, 'extensions' => 'mp4, avi, mov, webm', 'maxSize' => 1024 * 1024 * 50],
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
            'body_uz' => 'Body Uz',
            'body_ru' => 'Body Ru',
            'image' => 'Image',
            'image2' => 'Image 2',
            'image3' => 'Image 3',
            'image4' => 'Image 4',
            'image5' => 'Image 5',
            'video' => 'Video',
            'video2' => 'Video 2',
            'video3' => 'Video 3',
            'video4' => 'Video 4',
            'video5' => 'Video 5',
            'imageFile' => 'Rasm yuklash',
            'imageFile2' => 'Rasm 2 yuklash',
            'imageFile3' => 'Rasm 3 yuklash',
            'imageFile4' => 'Rasm 4 yuklash',
            'imageFile5' => 'Rasm 5 yuklash',
            'videoFile' => 'Video yuklash',
            'videoFile2' => 'Video 2 yuklash',
            'videoFile3' => 'Video 3 yuklash',
            'videoFile4' => 'Video 4 yuklash',
            'videoFile5' => 'Video 5 yuklash',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Upload image files
     */
    public function uploadImage($imageNumber = '')
    {
        $fileAttribute = 'imageFile' . $imageNumber;
        $dbAttribute = 'image' . $imageNumber;

        if ($this->$fileAttribute) {
            $uploadPath = Yii::getAlias('@frontend/web/uploads/company-history/images/');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Delete old image
            $this->deleteOldFile($this->$dbAttribute);

            $fileName = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $this->$fileAttribute->extension;

            if ($this->$fileAttribute->saveAs($uploadPath . $fileName)) {
                $this->$dbAttribute = '/uploads/company-history/images/' . $fileName;
                return true;
            }
        }
        return false;
    }

    /**
     * Upload video files
     */
    public function uploadVideo($videoNumber = '')
    {
        $fileAttribute = 'videoFile' . $videoNumber;
        $dbAttribute = 'video' . $videoNumber;

        if ($this->$fileAttribute) {
            $uploadPath = Yii::getAlias('@frontend/web/uploads/company-history/videos/');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Delete old video
            $this->deleteOldFile($this->$dbAttribute);

            $fileName = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $this->$fileAttribute->extension;

            if ($this->$fileAttribute->saveAs($uploadPath . $fileName)) {
                $this->$dbAttribute = '/uploads/company-history/videos/' . $fileName;
                return true;
            }
        }
        return false;
    }

    /**
     * Upload all images and videos
     */
    public function uploadFiles()
    {
        // Upload all images
        $this->uploadImage('');  // image
        $this->uploadImage('2'); // image2
        $this->uploadImage('3'); // image3
        $this->uploadImage('4'); // image4
        $this->uploadImage('5'); // image5

        // Upload all videos
        $this->uploadVideo('');  // video
        $this->uploadVideo('2'); // video2
        $this->uploadVideo('3'); // video3
        $this->uploadVideo('4'); // video4
        $this->uploadVideo('5'); // video5
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
            $this->deleteOldFile($this->image2);
            $this->deleteOldFile($this->image3);
            $this->deleteOldFile($this->image4);
            $this->deleteOldFile($this->image5);
            $this->deleteOldFile($this->video);
            $this->deleteOldFile($this->video2);
            $this->deleteOldFile($this->video3);
            $this->deleteOldFile($this->video4);
            $this->deleteOldFile($this->video5);
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