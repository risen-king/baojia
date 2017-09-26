<?php

    return [
                'appendTimestamp' => true,
                'forceCopy' => true,
                'bundles'=>[
                    'yii\web\JqueryAsset'=>[
                        'jsOptions'=>[
                            'position'=>\yii\web\View::POS_HEAD,
                        ]
                    ]
                ]
            ];