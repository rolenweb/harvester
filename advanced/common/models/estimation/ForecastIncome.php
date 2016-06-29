<?php

namespace common\models\estimation;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "forecast_income".
 *
 * @property integer $id
 * @property integer $domain_id
 * @property integer $income
 * @property integer $created_at
 * @property integer $updated_at
 */
class ForecastIncome extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forecast_income';
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
            [['domain_id', 'income', 'created_at', 'updated_at'], 'integer'],
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
            'income' => 'Income',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getDomain()
    {
        return $this->hasOne(Domain::className(), ['id' => 'domain_id']);
    }
}
