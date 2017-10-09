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

        public static function uploadRest($instance){


            $newName = static::getNewName($instance);

            $instance->saveAs(static::getRootPath().$newName);



            return  static::getRootUrl().$newName ;
        }
        
        
        public static function getNewName($fileObj){

            $newName =    sha1($fileObj->baseName)  . '-' . time(). '.' .$fileObj->extension;

            return  $newName;
 
            
        }

        public static function getRootPath(){

            return  \Yii::$app->basePath . '/../upload/';

        }

        public static function getRootUrl(){

            return  'http://img.baojia.local/';

        }
         
          
}