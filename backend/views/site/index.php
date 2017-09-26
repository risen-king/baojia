<?php

use yii\grid\GridView;
use common\helper\System;


/* @var $this yii\web\View */

$this->title = \Yii::t('common','System Home');
?>
<div class="site-index">
   
    
    <div class="row">
        <div class="col-md-6">
               <div class="box box-info">
    
        <div class="box-header with-border">
                     <h3 class="box-title">当日价格最高</h3>
            </div> 
        </div> 
  
        <div class="box-body">
             
              <?= GridView::widget([
      'layout' => "{items}",
      'dataProvider' => $highProducts,
      'columns' => [
      	'symbol',
           	[
	         'attribute'=>'catname',
	         'value' => 'category.catname'
           	 ],
         	'name',
         	'price',
          

             
        ],
    ]); ?>       
        
   
         </div> 
            
        </div>
        
       <div class="col-md-6">
               <div class="box box-info">
    
        <div class="box-header with-border">
            <h3 class="box-title">当日价格最低</h3>
            <div class="box-tools pull-right">
             </div> 
        </div> 
  
        <div class="box-body">
          
             
              <?= GridView::widget([
      'layout' => "{items}",
      'dataProvider' => $lowProducts,
      'columns' => [
      	'symbol',
           	[
	         'attribute'=>'catname',
	         'value' => 'category.catname'
           	 ],
         	'name',
         	'price',
          

             
        ],
    ]); ?>       
        
   
       
 
        </div> 
   
    </div> 
            
        </div>
        
    </div>
    
    
    <div class="row">
        <div class="col-md-6">
               <div class="box box-info">
    
        <div class="box-header with-border">
            <h3 class="box-title">当日涨幅</h3>
            <div class="box-tools pull-right">
                  <!-- Buttons, labels, and many other things can be placed here! -->
                  <!-- Here is a label for example -->
<!--                  <span class="label label-primary">Label</span>-->
            </div> 
        </div> 
  
        <div class="box-body">
            <div class="row">
               <div class="col-md-4">服务器时间</div>
               <div class="col-md-4"><?= System::getSystemTime() ?></div>
           </div>
 
        </div> 
   
    </div> 
            
        </div>
        
       <div class="col-md-6">
               <div class="box box-info">
    
        <div class="box-header with-border">
            <h3 class="box-title">当日跌幅</h3>
            <div class="box-tools pull-right">
                  <!-- Buttons, labels, and many other things can be placed here! -->
                  <!-- Here is a label for example -->
<!--                  <span class="label label-primary">Label</span>-->
            </div> 
        </div> 
  
        <div class="box-body">
            <div class="row">
               <div class="col-md-4">服务器时间</div>
               <div class="col-md-4"><?= System::getSystemTime() ?></div>
           </div>
 
        </div> 
   
    </div> 
            
        </div>
        
    </div>
   

    <div class="row">
        <div class="col-md-12">
                      <div class="box box-info">
    
        <div class="box-header with-border">
            <h3 class="box-title">系统信息</h3>
            <div class="box-tools pull-right">
                  <!-- Buttons, labels, and many other things can be placed here! -->
                  <!-- Here is a label for example -->
<!--                  <span class="label label-primary">Label</span>-->
            </div> 
        </div> 
  
        <div class="box-body">
            <div class="row">
               <div class="col-md-4">服务器时间</div>
               <div class="col-md-4"><?= System::getSystemTime() ?></div>
           </div>

            <div class="row">
                <div class="col-md-4">服务器信息</div>
                <div class="col-md-4"><?= System::getServerInfo() ?></div>
            </div>

            <div class="row">
                <div class="col-md-4">数据库版本</div>
                <div class="col-md-4"><?= System::getDBVersion() ?></div>
            </div>

            <div class="row">
              <div class="col-md-4">站点路径</div>
              <div class="col-md-4"><?= System::getBasePath() ?></div>
            </div>

        </div> 
   
    </div> 
        </div>
    </div>


</div>
