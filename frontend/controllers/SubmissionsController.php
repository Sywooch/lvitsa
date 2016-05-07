<?php

namespace frontend\controllers;

use common\models\Submissions;

class SubmissionsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if ($model->load(\Yii::$app->request->post())) {
            $model->status=true;
            $model->save();
        }
    }

}
