<?php

namespace backend\controllers;

use common\models\ProductItems;
use common\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

class ProductItemsController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ProductItems::find()->orderBy(['id' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new ProductItems();

        if ($model->load(Yii::$app->request->post())) {
            // DEBUG
            echo '<pre>';
            print_r(Yii::$app->request->post());
            echo '</pre>';

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->imageFile2 = UploadedFile::getInstance($model, 'imageFile2');
            $model->imageFile3 = UploadedFile::getInstance($model, 'imageFile3');

            echo '<pre>';
            var_dump($model->imageFile);
            var_dump($model->imageFile2);
            var_dump($model->imageFile3);
            echo '</pre>';

            // Validatsiya xatolarini ko'rish
            if (!$model->validate()) {
                echo '<pre>';
                print_r($model->errors);
                echo '</pre>';
                die();
            }

            $model->uploadImages();

            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Eski rasmlarni saqlash
        $oldImage = $model->image;
        $oldImage2 = $model->image2;
        $oldImage3 = $model->image3;

        if ($model->load(Yii::$app->request->post())) {
            // Rasmlarni olish
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->imageFile2 = UploadedFile::getInstance($model, 'imageFile2');
            $model->imageFile3 = UploadedFile::getInstance($model, 'imageFile3');

            // Validatsiya
            if ($model->validate()) {
                // Rasmlarni yuklash
                $model->uploadImages();

                // Agar yangi rasm yuklanmagan bo'lsa, eski rasmni saqlash
                if (empty($model->image)) {
                    $model->image = $oldImage;
                }
                if (empty($model->image2)) {
                    $model->image2 = $oldImage2;
                }
                if (empty($model->image3)) {
                    $model->image3 = $oldImage3;
                }

                // Saqlash
                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Mahsulot elementi muvaffaqiyatli yangilandi!');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                // Xatolarni ko'rsatish
                Yii::$app->session->setFlash('error', 'Xatolik: ' . json_encode($model->errors));
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        // Rasmlarni o'chirish
        $uploadPath = Yii::getAlias('@frontend/web/uploads/product-items/');

        if (!empty($model->image)) {
            $file = $uploadPath . basename($model->image);
            if (file_exists($file)) {
                @unlink($file);
            }
        }

        if (!empty($model->image2)) {
            $file = $uploadPath . basename($model->image2);
            if (file_exists($file)) {
                @unlink($file);
            }
        }

        if (!empty($model->image3)) {
            $file = $uploadPath . basename($model->image3);
            if (file_exists($file)) {
                @unlink($file);
            }
        }

        $model->delete();

        Yii::$app->session->setFlash('success', 'Mahsulot elementi o\'chirildi!');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = ProductItems::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Sahifa topilmadi.');
    }
}