<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\Nav;

?>

<?= Nav::widget([
    'options' => [
        'class' => 'nav-tabs',
        'style' => 'margin-bottom: 15px',
    ],
    'items' => [
        [
            'label' => Yii::t('user', 'Users'),
            'url' => ['member/index'],
        ],
        [
            'label' => '会员组',
            'url' => ['/group/index'],
            'visible' =>true,
        ],
        
  
        [
            'label' => Yii::t('user', 'Create'),
            'items' => [
                [
                    'label' => Yii::t('user', 'New user'),
                    'url' => ['create'],
                ],
                [
                    'label' => Yii::t('user', 'New Group'),
                    'url' => ['/group/create'],
                     'visible' =>true,
                ],
               
                
            ],
        ],
    ],
]) ?>
