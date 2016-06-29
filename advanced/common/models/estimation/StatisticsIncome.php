<?php

namespace common\models\estimation;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "statistics_income".
 *
 * @property integer $id
 * @property integer $domain_id
 * @property string $month
 * @property double $income
 * @property integer $created_at
 * @property integer $updated_at
 */
class StatisticsIncome extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statistics_income';
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
            [['month'], 'safe'],
            [['income'], 'number'],
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
            'month' => 'Month',
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
