<?php







namespace backend\models;







use Yii;



use yii\base\Model;



use yii\web\UploadedFile;



use yii\web\UrlManager;



use yii\helpers\BaseUrl;



use yii\imagine\Image;

use yii\imagine\BaseImage;







class UploadForm extends Model



{



    /**



     * @var UploadedFile



     */



    public $imageUpload;







    public function rules()



    {



        return [



            [['imageUpload'], 'file', 'skipOnEmpty' => true, 'maxFiles' => 10],



        ];



    }







    public function upload()



    {



        if ($this->validate()) {



            foreach($this->imageUpload as $image){



                $image->saveAs(  Yii::getAlias('@frontend') . '/web/images/products/full_size/' . $image->baseName . '.' . $image->extension);



                /*$file =  Yii::getAlias('@frontend') . '/web/images/products/' . $image->baseName . '.' . $image->extension;

                $thumbnailImagePath = Yii::getAlias('@frontend') . '/web/images/products_thumbs/' . $image->baseName . '.' . $image->extension;

                $imagine = Image::getImagine()

                ->open($file)

                ->thumbnail(new Box(120, 120))

                ->save($thumbnailImagePath, ['quality' => 90]);*/



              }







            return true;



        } else {



            return false;



        }



    }



}