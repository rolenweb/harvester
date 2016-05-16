<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "position".
 *
 * @property integer $id
 * @property string $table
 * @property integer $key_id
 * @property integer $start
 * @property integer $current
 * @property integer $end
 * @property integer $created_at
 * @property integer $updated_at
 */
class PositionProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
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
        return Yii::$app->get('db4');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key_id', 'start', 'current', 'end', 'created_at', 'updated_at'], 'integer'],
            [['table'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table' => 'Table',
            'key_id' => 'Key ID',
            'start' => 'Start',
            'current' => 'Current',
            'end' => 'End',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
