<?php

namespace common\models\currency;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "huf_rate".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $date
 * @property string $code
 * @property double $rate
 */
class HufRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'huf_rate';
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
            [['created_at', 'updated_at'], 'integer'],
            [['date'], 'safe'],
            [['rate'], 'number'],
            [['code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'date' => 'Date',
            'code' => 'Code',
            'rate' => 'Rate',
        ];
    }
}
