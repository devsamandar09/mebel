<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

class ProductItems extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $imageFile2;
    public $imageFile3;

    public static function tableName()
    {
        return 'product_items';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['product_id', 'title_uz', 'title_ru', 'price'], 'required'],
            [['product_id', 'created_at', 'updated_at'], 'integer'],
            [['description_uz', 'description_ru'], 'string'],
            [['price'], 'number'],
            [['title_uz', 'title_ru', 'image', 'image2', 'image3'], 'string', 'max' => 255],
            [['imageFile', 'imageFile2', 'imageFile3'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'maxSize' => 1024 * 1024 * 20],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product',
            'title_uz' => 'Nomi (UZ)',
            'title_ru' => 'Nomi (RU)',
            'description_uz' => 'Tavsif (UZ)',
            'description_ru' => 'Tavsif (RU)',
            'price' => 'Narxi',
            'image' => 'Rasm 1',
            'image2' => 'Rasm 2',
            'image3' => 'Rasm 3',
            'created_at' => 'Yaratilgan',
            'updated_at' => 'O\'zgartirilgan',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Products::class, ['id' => 'product_id']);
    }

    public function uploadImages()
    {
        $uploadPath = Yii::getAlias('@frontend/web/uploads/product-items/');

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $uploaded = false;

        // Image 1
        if ($this->imageFile instanceof UploadedFile) {
            // Eski rasmni o'chirish
            if (!empty($this->image)) {
                $oldFile = $uploadPath . basename($this->image);
                if (file_exists($oldFile)) {
                    @unlink($oldFile);
                }
            }

            $fileName = uniqid() . '.' . $this->imageFile->extension;
            $filePath = $uploadPath . $fileName;

            if ($this->imageFile->saveAs($filePath)) {
                $this->image = '/uploads/product-items/' . $fileName;
                $uploaded = true;
            }
        }

        // Image 2
        if ($this->imageFile2 instanceof UploadedFile) {
            if (!empty($this->image2)) {
                $oldFile = $uploadPath . basename($this->image2);
                if (file_exists($oldFile)) {
                    @unlink($oldFile);
                }
            }

            $fileName2 = uniqid() . '_2.' . $this->imageFile2->extension;
            $filePath2 = $uploadPath . $fileName2;

            if ($this->imageFile2->saveAs($filePath2)) {
                $this->image2 = '/uploads/product-items/' . $fileName2;
                $uploaded = true;
            }
        }

        // Image 3
        if ($this->imageFile3 instanceof UploadedFile) {
            if (!empty($this->image3)) {
                $oldFile = $uploadPath . basename($this->image3);
                if (file_exists($oldFile)) {
                    @unlink($oldFile);
                }
            }

            $fileName3 = uniqid() . '_3.' . $this->imageFile3->extension;
            $filePath3 = $uploadPath . $fileName3;

            if ($this->imageFile3->saveAs($filePath3)) {
                $this->image3 = '/uploads/product-items/' . $fileName3;
                $uploaded = true;
            }
        }

        return $uploaded;
    }
}