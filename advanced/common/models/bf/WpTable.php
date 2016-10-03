<?php

namespace common\models\bf;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "wp_table".
 *
 * @property integer $id
 * @property string $url
 * @property string $login
 * @property string $password
 * @property integer $created_at
 * @property integer $updated_at
 */
class WpTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wp_table';
    }

    public static function tableName()
    {
        return 'table_socks';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db9');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['url', 'login', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'login' => 'Login',
            'password' => 'Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
