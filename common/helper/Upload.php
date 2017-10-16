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
    

        
    /*
     * 参数是字符串时作为文件类型,是对象时是文件对象
     */
    public static function genFileName($file){

        $fileType = is_object($file) ? $file->extension : $file;

        return  uniqid(). '.' . $fileType;

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

        $fileName = static::genFileName($file);

        $config = static::getConfig();
        $savePath = $config['savePath']. $fileName;
        $saveUrl  = $config['saveUrl'] . $fileName;

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
                throw new \Exception('无法保存文件');
            }

        }else{
            throw new \Exception('无法解析文件');
        }
    }


          
}