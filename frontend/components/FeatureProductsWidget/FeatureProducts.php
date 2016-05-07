<?php
namespace app\components\FeatureProductsWidget;

use yii\base\Widget;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use frontend\models\Products;

class FeatureProducts extends Widget{
    public $latestDresses;
    public $feature;

    public function init(){
        parent::init();
        $this->latestDresses=Products::find()->where(["$this->feature"=>1])->limit(2)->all();
    }

    public function run(){
        return $this->render('index',['latestDresses'=>$this->latestDresses]);
    }
}
?>
