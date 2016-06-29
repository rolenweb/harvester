<?php

namespace common\models\estimation;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "domain".
 *
 * @property integer $id
 * @property string $name
 * @property integer $project_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Domain extends \yii\db\ActiveRecord
{
    const ACTIVE = 1;
    const PENDING = 2;
    const STOP = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domain';
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
            [['project_id', 'status', 'created_at', 'updated_at'], 'integer'],
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
            'project_id' => 'Project ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    public function getTitleStatus()
    {
        if ($this->status == self::ACTIVE) {
            return 'Active';
        }
        if ($this->status == self::PENDING) {
            return 'Pending';
        }
        if ($this->status == self::STOP) {
            return 'Stop';
        }
    }

    public static function dropdown()
    {
        return self::find()->select(['id','name'])->all();
    }

    public function getForecastTraffic()
    {
        return $this->hasOne(ForecastTraffic::className(), ['domain_id' => 'id']);
    }
    public function getForecastIncome()
    {
        return $this->hasOne(ForecastIncome::className(), ['domain_id' => 'id']);
    }
    public function getForecastCost()
    {
        return $this->hasOne(ForecastCost::className(), ['domain_id' => 'id']);
    }
    public function getStatisticsTraffic()
    {
        return $this->hasMany(StatisticsTraffic::className(), ['domain_id' => 'id']);
    }
}
