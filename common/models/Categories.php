<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title_uz
 * @property string $title_ru
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property string|null $image
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

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
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_uz', 'description_ru', 'image', 'created_at', 'updated_at'], 'default', 'value' => null],
            [[ 'title_uz', 'title_ru'], 'required'],
            [['category_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_ru', 'description_uz', 'description_ru', 'image'], 'string', 'max' => 255],

            // File upload rules
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
            'category_id' => 'Category ID',
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
     * @return bool
     */
    public function uploadImage()
    {
        if ($this->imageFile) {
            $uploadPath = Yii::getAlias('@frontend/web/uploads/categories/images/');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Delete old image
            $this->deleteOldFile($this->image);

            $fileName = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $this->imageFile->extension;

            if ($this->imageFile->saveAs($uploadPath . $fileName)) {
                $this->image = '/uploads/categories/images/' . $fileName;
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
            return true;
        }
        return false;
    }

}
