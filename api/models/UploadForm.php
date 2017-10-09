<?php

namespace api\models;

use yii\base\Model;
use yii\web\UploadedFile;

use common\helper\Upload;

class UploadForm extends Model
{
   
    public $file ;
 
 
    
    public function upload()
    {
          
          $fileInstance =    UploadedFile::getInstanceByName('avatar');
         
          if(!$fileInstance){
     
                $this->addError('avatar', '请选择文件');

                return false;
          }
          
   
         if ( $this->validate() ) {
                    
                $new_name = Upload::uploadRest($fileInstance);
               
                return $new_name;
                
         } else {
               return false;
         }
    }
}