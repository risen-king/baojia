<?php

namespace backend\models;

use Yii;

use common\models\Product as ProductBase;
use backend\models\Category;


/**
 * This is the model class for table "stock".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $code
 * @property string $name
 * @property string $ipo_date
 */
class Product extends ProductBase
{



    public function getTree(){

        return Category::getSelectTree();

    }
     
}
