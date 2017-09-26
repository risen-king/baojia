<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "member_group".
 *
 * @property integer $id
 * @property string $group_name
 */
class MemberGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['groupname'], 'required'],
            [['groupname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'groupname' => 'Group Name',
        ];
    }
}
