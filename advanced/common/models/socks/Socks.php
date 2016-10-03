<?php

namespace common\models\socks;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "table_socks".
 *
 * @property integer $id
 * @property string $ip
 * @property string $port
 * @property string $code
 * @property string $country
 * @property string $version
 * @property string $anonymity
 * @property string $https
 * @property integer $created_at
 * @property integer $updated_at
 */
class Socks extends \yii\db\ActiveRecord
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
        return 'table_socks';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db8');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['ip', 'port', 'code', 'country', 'version', 'anonymity', 'https'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'port' => 'Port',
            'code' => 'Code',
            'country' => 'Country',
            'version' => 'Version',
            'anonymity' => 'Anonymity',
            'https' => 'Https',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
