<?php

namespace common\models\refer;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "position".
 *
 * @property integer $id
 * @property integer $domain_id
 * @property integer $url_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Position extends \yii\db\ActiveRecord
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
        return 'position';
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
            [['domain_id', 'url_id', 'status', 'created_at', 'updated_at'], 'integer'],
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
            'url_id' => 'Url ID',
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

    public function getDomain()
    {
        return $this->hasOne(Domains::className(), ['id' => 'domain_id']);
    }

    public function getUrl()
    {
        return $this->hasOne(UrlRefer::className(), ['id' => 'url_id']);
    }

    
}
