<?php

namespace common\models\estimation;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $title
 * @property string $desctiption
 * @property string $currency
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Project extends \yii\db\ActiveRecord
{
    const ESTIMATION = 1;
    const START = 2;
    const PENDING = 3;
    const STOP = 4;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
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
            [['desctiption'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'currency'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'desctiption' => 'Desctiption',
            'currency' => 'Currency',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getTitleStatus()
    {
        if ($this->status == self::ESTIMATION) {
            return 'Estimation';
        }
        if ($this->status == self::START) {
            return 'Start';
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
        return self::find()->select(['id','title'])->all();
    }

    public function getDomains()
    {
        return $this->hasMany(Domain::className(), ['project_id' => 'id']);
    }

    public function getForecastTraffic()
    {
        $out = 0;
        $domains = $this->domains;
        if ($domains != NUll) {
            foreach ($domains as $domain) {
                if ($domain->forecastTraffic != NUll) {
                    $out += $domain->forecastTraffic->traffic;
                }
            }
        }
        return $out;
    }

    public function getForecastIncome()
    {
        $out = 0;
        $domains = $this->domains;
        if ($domains != NUll) {
            foreach ($domains as $domain) {
                if ($domain->forecastIncome != NUll) {
                    $out += $domain->forecastIncome->income;
                }
                
            }
        }
        return $out;
    }

    public function getForecastCost()
    {
        $out = 0;
        $domains = $this->domains;
        if ($domains != NUll) {
            foreach ($domains as $domain) {
                if ($domain->forecastCost != NUll) {
                    $out += $domain->forecastCost->cost;
                }
            }
        }
        return $out;
    }
}
