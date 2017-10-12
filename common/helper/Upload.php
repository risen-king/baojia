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

            $savePath = \Yii::getAlias('@img').$newName;
            $returnUrl = \Yii::$app->params['imgServer'].$newName;

            $instance->saveAs($savePath);

            return  $returnUrl ;
        }
        
        
        public static function getNewName($fileObj){

            $newName =    sha1($fileObj->baseName)  . '-' . time(). '.' .$fileObj->extension;

            return  $newName;
 
            
        }


        public static  function uploadBase64($baseUri)
        {
            //匹配出图片的格式
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $baseUri, $result)) {

                $type = $result[2];
                $newName = time() . ".{$type}";

                $savePath = \Yii::getAlias('@img') . date('Ymd', time()) . "/";
                if (!file_exists($savePath)) {
                    //检查是否有该文件夹，如果没有就创建，并给予最高权限
                    mkdir($savePath, 0700);
                }

                $savePath = $savePath . $newName;
                $returnUrl = \Yii::$app->params['imgServer'] . $newName;

                $content = str_replace($result[1], '', $baseUri);

                file_put_contents($savePath, base64_decode($content));

                return $returnUrl;


            }
        }


          
}