<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace console\controllers;

use common\helper\Util;
use yii;
use yii\console\Controller;
use yii\helpers\Console;


//use gmars\sms\Sms;

use common\component\dysms\Sms;

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



//    public function actionSms(){
//
//        $smsObj = new Sms(
//            'ALIYUN',
//            [
//                'appkey'=>'LTAIB4SuxIPY9UtY',
//                'secretkey'=>'WNaCowi2Ko9HkJW90l5J8gjuCse9nV'
//            ]
//
//        );
//
//        $result = $smsObj->send([
//            'mobile' => '15901635261',
//            'signname' => '王兴传',
//            'templatecode' => 'SMS_99045032',
//            'data' => [
//                'code' => 'asdg',
//                'time' => '2'
//            ],
//        ]);
//
//        if(!$result){
//            print_r($smsObj->errors);
//        }
//    }



    public function actionSms(){

        $smsConfig = \Yii::$app->params['sms']['aliyun'];
        $sms = new Sms($smsConfig['accessKeyId'],$smsConfig['accessKeySecret']);

        $phoneNumber = $smsConfig['phoneNumber'];
        $code = Util::generateNumber(6);
        $params = [
            "code"=> $code,
            "product"=>"productName"
        ];


        $response = $sms->sendSms(
            $smsConfig['signName'],
            $smsConfig['templateCode'],
            $phoneNumber,
            $params

        );



        print_r($response);

    }





}
