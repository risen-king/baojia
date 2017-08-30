<?php
namespace common\helper;

class  Util{
    public static function format($status,$data,$message){
          
          if(empty($data)){
              $data = null;
          }
          
          $result = [
            'status' => $status,
            'data'=> $data,
            'message'=> $message
         ];
          
          return $result;
        
    }
    
    public static  function error($message){
        
          if( is_array($message) ){
                    $message = current($message);
                    
                    if(is_array($message)){
                              $message = current($message);
                    }
          }
        
    
        return static::format( 'error', null, $message);
        
    }
    
    
    public static function  success($data){
        
        return static::format( 'success', $data, '' );
        
    }
    
    public static function upload($instance){
          
         $rootPath  =  \Yii::$app->basePath . '/../'; //根目录
          
          $newName = 'upload/'. 
                                $instance->baseName  . '-' .
                                time(). '.' .
                                $instance->extension;
         
          $instance->saveAs($rootPath.$newName);
    
          
          return  $newName ;
 
    }
    
    //产生指定位数的随机数
    public static function generateNumber($length=4){
        $min = pow(10 , ($length - 1));
        $max = pow(10, $length) - 1;
        return rand($min, $max);
    }
}
