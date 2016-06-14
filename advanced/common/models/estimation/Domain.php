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
}
