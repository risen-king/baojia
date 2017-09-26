<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\component;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\web\UploadedFile;
use yii\db\BaseActiveRecord;


/**
 * Description of Tree
 *
 * @author Administrator
 */
class UploadBehavior  extends  AttributeBehavior
{

         public $skipUpdateOnClean = false; 
         public $uploadField = 'thumb';
     
         public $basePath = '';
         public $baseUrl='';
          
          
          public function init(){
                
               parent::init();
          
                if (empty($this->attributes)) {
                    $this->attributes = [
                        BaseActiveRecord::EVENT_BEFORE_INSERT => $this->uploadField,
                        BaseActiveRecord::EVENT_BEFORE_UPDATE => $this->uploadField,
                    ];
         
                }
                
                if(  !$this->basePath || !$this->baseUrl ){
                    $this->basePath = Yii::$app->basePath . '/../upload/'; 
                    $this->baseUrl = 'http://img.baojia.local/';
                }
          }
          
      
          
          public function getValue($event) {
              
                $model = $this->owner;
                $field = $this->uploadField;

                return static::upload($model, $field);
          }
          
          

         public  function upload($model,$field){

                    $fileObj = UploadedFile::getInstance($model, $field);
                    
                    if( !$fileObj ){
                             return $model->$field;
                    }
                    
                    $result = static::getNewName($fileObj);

                    $fileObj->saveAs( $result['path'] );

                     return  $result['url'];
            
          }
        
        
         public function getNewName($fileObj){
    
                    $newName =  $fileObj->baseName  . '-' .
                                            time(). 
                                            '.' .$fileObj->extension;
                    
                    return [
                            'url' => $this->baseUrl . $newName,
                            'path' => $this->basePath . $newName
                    ];
                   
          }
         
          
}