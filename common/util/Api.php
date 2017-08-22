<?php
namespace common\util;

class  Api{
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
        
        return static::format( 'error', null, $message);
        
    }
    
    
    public static function  success($data){
        
        return static::format( 'success', $data, '' );
        
    }
}
