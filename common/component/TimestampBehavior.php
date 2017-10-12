<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\component;



class TimestampBehavior extends \yii\behaviors\TimestampBehavior{
    
    protected function getValue($event)
    {
        if ($this->value === null) {
            return date('Y-m-d H:i:s');
        }
        return parent::getValue($event);
    }
    
}

