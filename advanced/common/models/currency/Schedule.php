<?php

namespace common\models\currency;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "schedule".
 *
 * @property integer $id
 * @property string $date
 * @property string $cur1
 * @property string $cur2
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Schedule extends \yii\db\ActiveRecord
{

    const PENDING = 1;
    const POSTED = 2;
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
        return Yii::$app->get('db6');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['cur1', 'cur2'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'cur1' => 'Cur1',
            'cur2' => 'Cur2',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
