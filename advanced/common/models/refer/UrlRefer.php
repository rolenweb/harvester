<?php

namespace common\models\refer;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "url".
 *
 * @property integer $id
 * @property string $url
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class UrlRefer extends \yii\db\ActiveRecord
{
    const ACTIVE = 10;
    const ERROR = 5;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'url';
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
        return Yii::$app->get('db3');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['url'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function start()
    {
        return self::find()->orderBy(['id' => SORT_ASC])->limit(1)->one();
    }
    public static function end()
    {
        return self::find()->orderBy(['id' => SORT_DESC])->limit(1)->one();
    }

    public static function next($id)
    {
        $next_obj = self::find()->where(['and','id > :id'],[':id' => $id])->orderBy(['id' => SORT_ASC])->limit(1)->one();
        if ($next_obj != NULL) {
            return $next_obj->id;
        }else{
            return self::start();
        }
    }
}
