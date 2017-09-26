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
            'label' => Yii::t('money', 'Money Change'),
            'url' => ['/money/create'],
        ],
        [
            'label' => Yii::t('money', 'Money Records'),
            'url' => ['/money/index'],
            'visible' =>true,
        ],
        
          
        
        [
            'label' => Yii::t('money', 'Records Clear'),
            'url' => ['money/clear'],
            'visible' =>true,
        ],
        
  
         
    ],
]) ?>
