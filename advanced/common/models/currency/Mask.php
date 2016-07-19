<?php

namespace common\models\currency;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "mask".
 *
 * @property integer $id
 * @property string $mask
 * @property integer $created_at
 * @property integer $updated_at
 */
class Mask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mask';
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
        return Yii::$app->get('db6');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['mask'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mask' => 'Mask',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
