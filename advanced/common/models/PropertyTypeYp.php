<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "property_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property integer $key_id
 * @property string $pattern
 * @property string $created_at
 * @property string $updated_at
 */
class PropertyTypeYp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property_type';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'pattern', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'key_id' => 'Key ID',
            'pattern' => 'Pattern',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getKey()
    {
        return $this->hasOne(KeysYp::className(), ['id' => 'key_id']);
    }
}
