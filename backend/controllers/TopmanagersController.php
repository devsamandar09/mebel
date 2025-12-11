<?php

namespace backend\controllers;

use common\models\Topmanagers;
use common\models\TopmanagersSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TopmanagersController implements the CRUD actions for Topmanagers model.
 */
class TopmanagersController extends Controller
{
    /**
     * @inheritDoc
     */
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

    /**
     * Lists all Topmanagers models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TopmanagersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Topmanagers model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Topmanagers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Topmanagers();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                // Rasmni olish
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

                // Rasmni yuklash
                $model->uploadImage();

                // Null qilish
                $model->imageFile = null;

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Menejer muvaffaqiyatli qo\'shildi!');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Topmanagers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                // Rasmni olish
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

                // Rasmni yuklash
                $model->uploadImage();

                // Null qilish
                $model->imageFile = null;

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Menejer muvaffaqiyatli yangilandi!');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Topmanagers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Menejer muvaffaqiyatli o\'chirildi!');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Topmanagers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Topmanagers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Topmanagers::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}