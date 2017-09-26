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
            'label' => Yii::t('common', 'Articles'),
            'url' => ['article/index'],
        ],
        [
            'label' => Yii::t('common', 'Categories'),
            'url' => ['/artcat/index'],
            'visible' =>true,
        ],
        
  
        [
            'label' => Yii::t('user', 'Create'),
            'items' => [
                [
                    'label' => Yii::t('common', 'Create Article'),
                    'url' => ['create'],
                ],
                [
                    'label' => Yii::t('common', 'Create Category'),
                    'url' => ['/artcat/create'],
                     'visible' =>true,
                ],
               
                
            ],
        ],
    ],
]) ?>
