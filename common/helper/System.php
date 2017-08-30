<?php
namespace common\helper;


/**
 * Description of Util
 *
 * @author Administrator
 */
class System {
    public static function getOS(){
        return PHP_OS;
    }
    
    public static function getPhpVersion(){
        return PHP_VERSION;
    }
    
    public static function getZendVersion(){
        return zend_version();
    }
    
    
    
    public static function getServerSoftware(){
        return $_SERVER['SERVER_SOFTWARE'];
    }
    
    public static function getServerIp(){
        return $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT']; 
    }
    
   
    
    public static function getMaxUploadSize(){
        return get_cfg_var("upload_max_filesize");
    }
    
    //最大执行时间 单位/s
    public static function getExecutionTime(){
        return get_cfg_var("max_execution_time");
    }
    
    public static function getMaxMemory(){
        return get_cfg_var ("memory_limit");
    }
    
    public static function getSystemTime(){
        return date('Y-m-d G:i:s');
    }
    
    public static function getServerInfo(){
        return static::getOS().' '.static::getServerSoftware().' ['.static::getServerIp().']';
    }
    
    public static function getDBInfo(){
        $dns = \Yii::$app->db->dsn;
        
        
        $info = explode(':', $dns);
        $info [1] = explode(';', $info [1]);
        
        $info['type'] = $info[0];
        foreach($info [1] as $v){
            $temp = explode('=', $v);
            $info[$temp[0]] = $temp[1];
        }
        
        unset($info[0]);
        unset($info[1]);
        
        return $info;
    }
    
    public static function getDBVersion(){
       $info = static::getDBInfo();
       \Yii::$app->db->open();
       return  strtoupper($info['type']).' '.\Yii::$app->db->pdo->getAttribute(\PDO::ATTR_SERVER_VERSION );
    }
    
    public static function getBasePath(){
        return dirname(\Yii::$app->basePath);
    }
}
