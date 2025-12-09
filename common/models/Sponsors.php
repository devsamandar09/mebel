<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "sponsors".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property string|null $logo
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Sponsors extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $logoFile;

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
        return 'sponsors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_uz', 'description_ru', 'logo', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['name_uz', 'name_ru'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_uz', 'name_ru', 'description_uz', 'description_ru', 'logo'], 'string', 'max' => 255],

            // File upload rules
            [['logoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, webp', 'maxSize' => 1024 * 1024 * 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Name Uz',
            'name_ru' => 'Name Ru',
            'description_uz' => 'Description Uz',
            'description_ru' => 'Description Ru',
            'logo' => 'Logo',
            'logoFile' => 'Logo yuklash',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Upload logo file
     * @return bool
     */
    public function uploadLogo()
    {
        if ($this->logoFile) {
            $uploadPath = Yii::getAlias('@frontend/web/uploads/sponsors/logos/');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Delete old logo
            $this->deleteOldFile($this->logo);

            $fileName = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $this->logoFile->extension;

            if ($this->logoFile->saveAs($uploadPath . $fileName)) {
                $this->logo = '/uploads/sponsors/logos/' . $fileName;
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
            $this->deleteOldFile($this->logo);
            return true;
        }
        return false;
    }

}
