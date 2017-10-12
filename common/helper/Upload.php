<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\helper;


use yii\db\Exception;
use yii\web\UploadedFile;

/**
 * Description of Tree
 *
 * @author Administrator
 */
class Upload{
    

        
        
    public static function getNewName($file){

        $newName = '';
        if( is_object($file) ){
            $newName = uniqid(). '.' .$file->extension;
        }else{
            time().'.'.$file;
        }

        return  $newName;

    }

    public static function getConfig(){

        $basePath = \Yii::getAlias('@img');
        $baseUrl  = \Yii::$app->params['imgServer'];

        $subPath = date('Ymd', time()) ;

        $savePath = $basePath .'/'.  $subPath.'/';
        $saveUrl  = $baseUrl  .'/'.  $subPath.'/';


        //检查是否有该文件夹，如果没有就创建，并给予最高权限
        if (!file_exists($savePath)) {
            mkdir($savePath, 0700,true);
        }

        return [
            'savePath'=> $savePath,
            'saveUrl' => $saveUrl
        ];

    }

    public static function getPath($file){

        $newName = static::getNewName($file);

        $config = static::getConfig();
        $savePath = $config['savePath'].$newName;
        $saveUrl  = $config['saveUrl'] .$newName;

        return [
            'savePath' => $savePath,
            'saveUrl' => $saveUrl

        ];
    }



    public static function upload($model,$field){

        $fileObj = UploadedFile::getInstance($model, $field);

        if($fileObj){
            return static::uploadRest($fileObj);
        }else{
            return null;
        }



    }

    public static function uploadRest($file){

        $path = static::getPath($file);


        $file->saveAs($path['savePath']);

        return  $path['saveUrl'] ;
    }

    public static  function uploadBase64($base64)
    {

        $result = preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64, $match);

        //匹配出图片的格式
        if ( $result ) {

            $type = $match[2];
            $content = str_replace($match[1], '', $base64);


            $path = static::getPath($type);

            $_f = file_put_contents($path['savePath'], base64_decode($content));

            if($_f){
                return $path['saveUrl'];

            }else{
                throw new Exception('无法保存文件');
            }

        }else{
            throw new Exception('无法解析文件');
        }
    }


          
}