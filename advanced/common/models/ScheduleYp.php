<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $id
 * @property string $name
 * @property integer $key_id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class ScheduleYp extends \yii\db\ActiveRecord
{
    const PENDING = 5;
    const ACTIVE = 10;
    const FINISH = 15;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
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
            [['key_id', 'status', 'start', 'end'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'start' => 'Start',
            'end' => 'End'
        ];
    }

    public function getKey()
    {
        return $this->hasOne(KeysYp::className(), ['id' => 'key_id']);
    }

    public static function start($id)
    {
        $schedule = self::findOne($id);
        if ($schedule != NULL) {
            $schedule->start = time();
            $schedule->end = NULL;
            $schedule->save();
        }
    }

    public static function stop($id)
    {
        $schedule = self::findOne($id);
        if ($schedule != NULL) {
            $schedule->end = time();
            $schedule->save();
        }
    }
}
