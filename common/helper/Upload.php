<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\helper;


use yii\web\UploadedFile;

/**
 * Description of Tree
 *
 * @author Administrator
 */
class Upload{
    
         public static function upload($model,$field){

                    $fileObj = UploadedFile::getInstance($model, $field);
             
                    $newName = static::getNewName($fileObj);

                    $fileObj->saveAs($newName);
                    
                    return  $newName ;

         }
        
        
        public static function getNewName($fileObj){
            
                    $rootPath  =  \Yii::$app->basePath . '/../'; 
                    
                    $newName =    'upload/' . 
                                    $fileObj->baseName  . '-' .
                                    time(). 
                                    '.' .$fileObj->extension;
          
                    return $rootPath . $newName;
 
            
         }
         
          
}