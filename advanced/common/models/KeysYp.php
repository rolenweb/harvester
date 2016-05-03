<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "keys".
 *
 * @property integer $id
 * @property string $key
 * @property string $created_at
 * @property string $updated_at
 */
class KeysYp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keys';
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
            [['created_at', 'updated_at'], 'safe'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function dropDownList()
    {
        return self::find()->all();
    }

    public function getPropertyTypes()
    {
        return $this->hasMany(PropertyTypeYp::className(), ['key_id' => 'id']);
    }
}
