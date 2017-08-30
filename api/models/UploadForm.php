<?php

namespace api\models;

use yii\base\Model;
use yii\web\UploadedFile;

use common\helper\Util;

class UploadForm extends Model
{
   
    public $file ;
 
 
    
    public function upload()
    {
          
          $fileInstance =    UploadedFile::getInstanceByName('file');
         
          if(!$fileInstance){
     
                    $this->addError('file', '请选择文件');
                    
                    return false;
          }
          
   
         if ( $this->validate() ) {
                    
                    $new_name = Util::upload($fileInstance);
               
                   return $new_name;
                
         } else {
                   return false;
         }
    }
}