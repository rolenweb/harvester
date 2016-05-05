<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\models\CityUs;

/**
 * This is the model class for table "position".
 *
 * @property integer $id
 * @property integer $key_id
 * @property integer $start
 * @property integer $current
 * @property integer $end
 * @property string $created_at
 * @property string $updated_at
 */
class PositionYp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
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
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key_id', 'start', 'current', 'end'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key_id' => 'Key ID',
            'start' => 'Start',
            'current' => 'Current',
            'end' => 'End',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getKey()
    {
        return $this->hasOne(KeysYp::className(), ['id' => 'key_id']);
    }

    public function getStartCity()
    {
        return $this->hasOne(CityUs::className(), ['id' => 'start']);
    }
    public function getCurrentCity()
    {
        return $this->hasOne(CityUs::className(), ['id' => 'current']);
    }
    public function getEndCity()
    {
        return $this->hasOne(CityUs::className(), ['id' => 'end']);
    }

    public function process()
    {
        $n = 1;
        $current = $this->currentCity;
        $cities = CityUs::find()->select('id')->all();
        if ($cities !== NULL) {
            foreach ($cities as $city) {
                if ($city->id > $current->id) {
                    break;
                }
                $n++;
            }
        }
        return [
            '0' => $n,
            '1' => count($cities),
        ];
    }
}
