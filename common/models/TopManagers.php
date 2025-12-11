<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "top_managers".
 *
 * @property int $id
 * @property int $company_id
 * @property string|null $image
 * @property string $full_name
 * @property string $position
 * @property string|null $bio
 *
 * @property AboutCompany $company
 */
class TopManagers extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

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
            [['image'], 'string', 'max' => 500],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => AboutCompany::class, 'targetAttribute' => ['company_id' => 'id']],

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
            'company_id' => 'Company ID',
            'image' => 'Image',
            'imageFile' => 'Rasm yuklash',
            'full_name' => 'Full Name',
            'position' => 'Position',
            'bio' => 'Bio',
        ];
    }

    /**
     * Upload image file
     */
    public function uploadImage()
    {
        if ($this->imageFile) {
            $uploadPath = Yii::getAlias('@frontend/web/uploads/top-managers/');

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
                $this->image = '/uploads/top-managers/' . $fileName;
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
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(AboutCompany::class, ['id' => 'company_id']);
    }
}