<?php

namespace common\models;

use Yii;

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
}
