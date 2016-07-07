<?php

namespace common\models\wpost;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "roofing".
 *
 * @property integer $id
 * @property string $key
 * @property integer $created_at
 * @property integer $updated_at
 */
class Roofing extends \yii\db\ActiveRecord
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
        return 'roofing';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db5');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
