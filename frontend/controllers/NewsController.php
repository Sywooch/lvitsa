<?php

namespace frontend\controllers;

use common\models\News;
use yii\data\ActiveDataProvider;
use frontend\models\Products;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => News::find()
        ]);
        $popularProducts=Products::find()->where(['popular'=>1])->limit(2)->all();

        return $this->render('index',['dataProvider'=>$dataProvider,'popularProducts'=>$popularProducts]);
    }

    public function actionView($id)
    {
        $popularProducts=Products::find()->where(['popular'=>1])->limit(2)->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'popularProducts' => $popularProducts
        ]);
    }

    protected function findModel($id)
    {
        if (($model = news::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
