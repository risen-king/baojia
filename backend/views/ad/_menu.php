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
            'label' => Yii::t('common', 'Ad'),
            'url' => ['ad/index'],
        ],
        [
            'label' => Yii::t('common', 'AdPlaces'),
            'url' => ['/ad-place/index'],
            'visible' =>true,
        ],
        
  
        [
            'label' => Yii::t('common', 'Create'),
            'items' => [
                [
                    'label' => Yii::t('common', 'Create Ad'),
                    'url' => ['/ad/create'],
                ],
                [
                    'label' => Yii::t('common', 'Create AdPlace'),
                    'url' => ['/category/create'],
                     'visible' =>true,
                ],
               
                
            ],
        ],
    ],
]) ?>
