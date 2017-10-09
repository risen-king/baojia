<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace console\controllers;

use yii;
use yii\console\Controller;
use yii\helpers\Console;


use gmars\sms\Sms;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TestController extends Controller
{



    public function actionSms(){

        $smsObj = new Sms(
            'ALIDAYU',
            [
                'appkey'=>'LTAIB4SuxIPY9UtY',
                'secretkey'=>'WNaCowi2Ko9HkJW90l5J8gjuCse9nV'
            ]

        );

        $result = $smsObj->send([
            'mobile' => '15901635261',
            'signname' => '王兴传',
            'templatecode' => 'SMS_99045032',
            'data' => [
                'code' => 'asdg',
                'time' => '2'
            ],
        ]);

        if(!$result){
            print_r($smsObj->errors);
        }
    }





}
