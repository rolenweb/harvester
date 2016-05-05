<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "property".
 *
 * @property integer $id
 * @property integer $key_id
 * @property integer $city_id
 * @property integer $property_type_id
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 */
class PropertyYp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property';
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
            [['key_id', 'city_id', 'property_type_id', 'number'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key_id' => 'Key ID',
            'city_id' => 'City ID',
            'property_type_id' => 'Property Type ID',
            'value' => 'Value',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function countItem($kid, $cid)
    {
        return self::find()->where(['and','key_id = :kid', 'city_id = :cid'],[':kid' => $kid, ':cid' => $cid])->select(['number'])->indexBy('number')->all();
    }

    public static function forItem($kid, $cid, $number)
    {
        return self::find()->where(['and','key_id = :kid', 'city_id = :cid', 'number = :number'],[':kid' => $kid, ':cid' => $cid, ':number' => $number])->orderBy(['property_type_id' => SORT_ASC])->all();
    }

    public function getType()
    {
        return $this->hasOne(PropertyTypeYp::className(), ['id' => 'property_type_id']);
    }
}
