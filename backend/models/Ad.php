<?php

namespace backend\models;

use Yii;
use backend\models\AdPlace;
use common\component\UploadBehavior;
use common\component\TimestampBehavior;

/**
 * This is the model class for table "ad".
 *
 * @property integer $id
 * @property integer $place_id
 * @property string $name
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Ad extends  \common\models\Ad
{

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            UploadBehavior::className()
        ];
    }




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_id'], 'required'],
            [['place_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
        ];
    }



    public function getAllPlaces(){
        $adPlace = AdPlace::find()->select('id,name')->asArray()->all();

        $result = [];
        if($adPlace){
            foreach($adPlace as $k=>$val){
                $result[$val['id']] = $val['name'];
            }

        }

        return $result;
    }


}
