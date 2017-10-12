<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\component;

use common\helper\Upload;
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

                

          }
          
      
          
          public function getValue($event) {
              
                $model = $this->owner;
                $field = $this->uploadField;

                $result = Upload::upload($model, $field);

                if($result){

                    return Upload::upload($model, $field);
                }else{
                    return $model->$field;
                }


          }
          
          


        
        

         
          
}