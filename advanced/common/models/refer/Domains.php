<?php

namespace common\models\refer;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "domains".
 *
 * @property integer $id
 * @property string $domain
 * @property string $url
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Domains extends \yii\db\ActiveRecord
{

    const ACTIVE = 1;
    const PENDING = 2;
    const STOP = 3;

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
        return 'domains';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db3');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['domain', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain' => 'Domain',
            'url' => 'Url',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getStatus()
    {
        if ($this->status === self::ACTIVE) {
            return 'Active';
        }
        if ($this->status === self::PENDING) {
            return 'Pending';
        }
        if ($this->status === self::STOP) {
            return 'Stop';
        }
    }

    public static function dropdown()
    {
        return self::find()->select(['id','domain'])->all();
    }
}
