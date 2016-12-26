<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Portfolio;
use yii\web\UploadedFile;

class PortfolioController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $model = new Portfolio();
        $dataProvider = $model->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * @inheritdoc
     */
    public function actionCreate()
    {
        $model = new Portfolio();

        if (Yii::$app->request->isPost) {
            $model->image = UploadedFile::getInstances($model, 'image');

            if ($model->image) {
                foreach ($model->image as $file) {

                    $file->saveAs(\Yii::getAlias('@backend').'/upload/' . $file->baseName . '.' . $file->extension);
                    $model->image = \Yii::getAlias('@backend').'/upload/' . $file->baseName . '.' . $file->extension;
                    $model->save();
                }
            }
        }


        if ($model->load(Yii::$app->request->post('Portfolio'))) {
            return $this->render('create');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing Portfolio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = new Portfolio();
        $model->findOne($id)->delete();

        return $this->redirect(['index']);
    }
}