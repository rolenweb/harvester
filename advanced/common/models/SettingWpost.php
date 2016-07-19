<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "setting".
 *
 * @property integer $id
 * @property string $domain
 * @property string $hash
 * @property string $keys
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class SettingWpost extends \yii\db\ActiveRecord
{
    const PENDING = 5;
    const ACTIVE = 10;
    const FINISH = 15;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db5');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['domain', 'hash', 'keys','user', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain' => 'Domain',
            'hash' => 'Hash',
            'keys' => 'Keys',
            'user' => 'User',
            'type' => 'Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function dropDownList()
    {
        return self::find()->select(['id','domain'])->all();
    }

    public function getPosition()
    {
        return $this->hasOne(PositionWpost::className(), ['setting_id' => 'id']);
    }
}
