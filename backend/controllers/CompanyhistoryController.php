<?php

namespace backend\controllers;

use common\models\CompanyHistory;
use common\models\CompanyhistorySearch;
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

        if ($this->request->isPost && $model->load($this->request->post())) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->videoFile = UploadedFile::getInstance($model, 'videoFile');

            // Avval fayllarni yuklash
            $model->uploadImage();
            $model->uploadVideo();

            // Upload qilingandan keyin null qilish (validator xato bermasligi uchun)
            $model->imageFile = null;
            $model->videoFile = null;

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
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

        if ($this->request->isPost && $model->load($this->request->post())) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->videoFile = UploadedFile::getInstance($model, 'videoFile');

            // Avval fayllarni yuklash
            $model->uploadImage();
            $model->uploadVideo();

            // Upload qilingandan keyin null qilish
            $model->imageFile = null;
            $model->videoFile = null;

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
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