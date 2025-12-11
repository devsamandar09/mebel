<?php

namespace backend\controllers;

use common\models\CompanyHistory;
use common\models\CompanyhistorySearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class CompanyhistoryController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    // CSRF validation'ni disable qilish (faqat test uchun)
    public function beforeAction($action)
    {
        if (in_array($action->id, ['create', 'update'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $searchModel = new CompanyhistorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
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
        $model = new CompanyHistory();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                // Debug: Yuklangan ma'lumotlarni ko'rish
                echo '<pre>';
                print_r($this->request->post());
                echo '</pre>';

                // Barcha rasmlarni olish
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                $model->imageFile2 = UploadedFile::getInstance($model, 'imageFile2');
                $model->imageFile3 = UploadedFile::getInstance($model, 'imageFile3');
                $model->imageFile4 = UploadedFile::getInstance($model, 'imageFile4');
                $model->imageFile5 = UploadedFile::getInstance($model, 'imageFile5');

                // Barcha videolarni olish
                $model->videoFile = UploadedFile::getInstance($model, 'videoFile');
                $model->videoFile2 = UploadedFile::getInstance($model, 'videoFile2');
                $model->videoFile3 = UploadedFile::getInstance($model, 'videoFile3');
                $model->videoFile4 = UploadedFile::getInstance($model, 'videoFile4');
                $model->videoFile5 = UploadedFile::getInstance($model, 'videoFile5');

                // Barcha fayllarni yuklash
                $model->uploadFiles();

                // Upload qilingandan keyin null qilish
                $model->imageFile = null;
                $model->imageFile2 = null;
                $model->imageFile3 = null;
                $model->imageFile4 = null;
                $model->imageFile5 = null;
                $model->videoFile = null;
                $model->videoFile2 = null;
                $model->videoFile3 = null;
                $model->videoFile4 = null;
                $model->videoFile5 = null;

                // Debug: Model validatsiya
                if (!$model->validate()) {
                    echo '<pre>';
                    echo "Validatsiya xatolari:\n";
                    print_r($model->errors);
                    echo '</pre>';
                    die();
                }

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Ma\'lumot muvaffaqiyatli saqlandi!');
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    echo '<pre>';
                    echo "Saqlashda xatolik:\n";
                    print_r($model->errors);
                    echo '</pre>';
                    die();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                // Barcha rasmlarni olish
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                $model->imageFile2 = UploadedFile::getInstance($model, 'imageFile2');
                $model->imageFile3 = UploadedFile::getInstance($model, 'imageFile3');
                $model->imageFile4 = UploadedFile::getInstance($model, 'imageFile4');
                $model->imageFile5 = UploadedFile::getInstance($model, 'imageFile5');

                // Barcha videolarni olish
                $model->videoFile = UploadedFile::getInstance($model, 'videoFile');
                $model->videoFile2 = UploadedFile::getInstance($model, 'videoFile2');
                $model->videoFile3 = UploadedFile::getInstance($model, 'videoFile3');
                $model->videoFile4 = UploadedFile::getInstance($model, 'videoFile4');
                $model->videoFile5 = UploadedFile::getInstance($model, 'videoFile5');

                // Barcha fayllarni yuklash
                $model->uploadFiles();

                // Upload qilingandan keyin null qilish
                $model->imageFile = null;
                $model->imageFile2 = null;
                $model->imageFile3 = null;
                $model->imageFile4 = null;
                $model->imageFile5 = null;
                $model->videoFile = null;
                $model->videoFile2 = null;
                $model->videoFile3 = null;
                $model->videoFile4 = null;
                $model->videoFile5 = null;

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Ma\'lumot muvaffaqiyatli yangilandi!');
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'Xatolik yuz berdi: ' . json_encode($model->errors));
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Ma\'lumot muvaffaqiyatli o\'chirildi!');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = CompanyHistory::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}