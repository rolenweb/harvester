<?php

namespace common\models\estimation;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "forecast_cost".
 *
 * @property integer $id
 * @property integer $domain_id
 * @property double $income
 * @property integer $created_at
 * @property integer $updated_at
 */
class ForecastCost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forecast_cost';
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
        return Yii::$app->get('db7');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain_id', 'created_at', 'updated_at'], 'integer'],
            [['cost'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain_id' => 'Domain ID',
            'cost' => 'Cost',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getDomain()
    {
        return $this->hasOne(Domain::className(), ['id' => 'domain_id']);
    }
}
