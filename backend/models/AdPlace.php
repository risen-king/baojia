<?php

namespace backend\models;

use Yii;
use common\component\UploadBehavior;
use common\component\TimestampBehavior;

/**
 * This is the model class for table "ad_place".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class AdPlace extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            //UploadBehavior::className()
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ad_place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Name'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
