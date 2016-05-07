<?php



namespace backend\controllers;



use common\models\ProductCategory;

use Yii;

use backend\models\Products;

use yii\data\ActiveDataProvider;

use yii\helpers\ArrayHelper;

use yii\web\Controller;

use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

use backend\models\Categories;

use backend\models\Images;

use yii\helpers\BaseArrayHelper;

use yii\web\UploadedFile;

use backend\models\UploadForm;

use yii\filters\AccessControl;

use backend\models\ProductsSearch;

use yii\helpers\Json;



/**

 * ProductsController implements the CRUD actions for Products model.

 */

class ProductsController extends Controller

{

    public function behaviors()

    {

        return [

            'verbs' => [

                'class' => VerbFilter::className(),

                'actions' => [

                    'delete' => ['post'],

                ],

            ],

            'access' => [

                'class' => AccessControl::className(),

                'rules' => [

                    [

                        'allow' => true,

                        'roles' => ['@'],

                    ],

                ]

            ]

        ];

    }



    /**

     * Lists all Products models.

     * @return mixed

     */

    public function actionIndex()

    {

        $searchModel = new ProductsSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        /*edit price*/

        if (Yii::$app->request->post('hasEditable')) {

            $product_id = Yii::$app->request->post('editableKey');

            $product = Products::findOne($product_id);

            $out = Json::encode(['output'=>'', 'message'=>'']);



            $post = [];

            $posted = current($_POST['Products']);

            $post['Products'] = $posted;



            if ($product->load($post)) {

                $product->save();

            }

            // return ajax json encoded response and exit

            echo $out;

            return;

        }

        /*edit price*/



        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);

    }



    /**

     * Displays a single Products model.

     * @param integer $id

     * @return mixed

     */

    public function actionView($id)

    {

        return $this->render('view', [

            'model' => $this->findModel($id),

        ]);

    }



    /**

     * Creates a new Products model.

     * If creation is successful, the browser will be redirected to the 'view' page.

     * @return mixed

     */

    public function actionCreate()



        /*

         *

         *   $imageUpload = new UploadForm();

        $imageUpload->imageUpload = UploadedFile::getInstances($imageUpload, 'imageUpload');



            if (!empty($imageUpload->imageUpload)) {

                $imageUpload->upload();

                }



        return $this->render('upltest',['imageUpload'=>$imageUpload]);*/

    {

        $model = new Products();



        $imageUpload = new UploadForm();

        $imageUpload->imageUpload = UploadedFile::getInstances($imageUpload, 'imageUpload');



        $modelCategories = new ProductCategory();

        $modelCategories->cats = ArrayHelper::map(Categories::find()->all(),'id','title');



        if ($model->load(Yii::$app->request->post())) {





            if (!empty($model->brand) || !empty($model->name)) {

                $model->alias=strtolower(Products::transliteration($model->brand . '-' . $model->name));

            }



            $model->save();



            foreach ($_POST['ProductCategory']['cats'] as $category) {

                $cats = new ProductCategory();

                $cats->category_id = $category;

                $cats->product_id = $model->id;

                $cats->save();

            }







            if (!empty($imageUpload->imageUpload)) {

                foreach ($imageUpload->imageUpload as $key) {

                    $image = new Images();

                    $image->product_id = $model->id;

                    $image->url = $key->baseName . '.' . $key->extension;

                    $image->save();

                }

                $imageUpload->upload();

            }



            return $this->redirect(['index']);





        } else {

            return $this->render('create', [

                'model' => $model,

                'imageUpload' => $imageUpload,

                'modelCategories' => $modelCategories,

            ]);

        }

    }



    /**

     * Updates an existing Products model.

     * If update is successful, the browser will be redirected to the 'view' page.

     * @param integer $id

     * @return mixed

     */

    public function actionUpdate($id)

    {

        $imageUpload = new UploadForm();

        $imageUpload->imageUpload = UploadedFile::getInstances($imageUpload, 'imageUpload');



        $categories = new ActiveDataProvider([

            'query' => Categories::find()->all()

        ]);



        foreach ($categories->query as $key=>$value){

            $results[]=$value;

        }

        $categories=BaseArrayHelper::map($results, 'alias', 'title');



        $model = $this->findModel($id);



        $modelCategories = new ProductCategory();

        $modelCategories->cats = ArrayHelper::map(ProductCategory::find()->where(['product_id'=>$id])->all(),'id','category_id');



        $allProducts = ProductCategory::find()->where(['product_id'=>$model->id])->all();



        if ($model->load(Yii::$app->request->post())) {

            //$cats = ProductCategory::find()->where(['product_id'=>$model->id,'category_id'=>$category])->one();



            foreach($allProducts as $key=>$value){

                $value->delete();

            }





            foreach ($_POST['ProductCategory']['cats'] as $category) {

                $cats = new ProductCategory();

                $cats->category_id = $category;

                $cats->product_id = $model->id;

                $cats->save();

            }



            $model->alias=strtolower(Products::transliteration($model->brand . '-' . $model->name));

            $model->save();



            if (!empty($imageUpload->imageUpload)) {

                foreach($imageUpload->imageUpload as $key){

                    $image=new Images();

                    $image->product_id=$model->id;

                    $image->url=$key->baseName . '.' . $key->extension;

                    $image->save();

                }

                $imageUpload->upload();

            }







            return $this->redirect(['update', 'id' => $model->id]);

        } else {

            return $this->render('update', [

                'model' => $model,

                'categories' => $categories,

                'imageUpload' => $imageUpload,

                'modelCategories' => $modelCategories,



            ]);

        }

    }

    public function actionDelete($id)

    {

        $this->findModel($id)->delete();



        return $this->redirect(['index']);

    }



    /**

     * Finds the Products model based on its primary key value.

     * If the model is not found, a 404 HTTP exception will be thrown.

     * @param integer $id

     * @return Products the loaded model

     * @throws NotFoundHttpException if the model cannot be found

     */

    protected function findModel($id)

    {

        if (($model = Products::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }



    public function actionUpltest(){

        $imageUpload = new UploadForm();

        $imageUpload->imageUpload = UploadedFile::getInstances($imageUpload, 'imageUpload');



            if (!empty($imageUpload->imageUpload)) {

                $imageUpload->upload();

                }



        return $this->render('upltest',['imageUpload'=>$imageUpload]);

    }



    public function actionDeleteimage(){

        $id=Yii::$app->request->post('imageId');

        $image=Images::find()->where(['id'=>$id])->one();

        unlink(Yii::getAlias('@frontend') . '/web/images/products/full_size/' . $image->url);

        $image->delete();

    }



    public function actionTest(){

        $products=Products::find()->where(['category_id'=>'platya-koktelnie'])->all();



        foreach($products as $key=>$value) {

            $value->category_id=17;

            $value->update();

            //var_dump($value);

        }

    }

}

