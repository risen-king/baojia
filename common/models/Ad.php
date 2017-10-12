<?php

namespace common\models;

use Yii;


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
class Ad extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ad';
    }




    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'place_id' => Yii::t('common', '广告位'),
            'name' => Yii::t('common', 'Name'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }



    public function getPlace(){
        return   $this->hasOne(AdPlace::className(), ['id'=>'place_id']) ;
    }
}
