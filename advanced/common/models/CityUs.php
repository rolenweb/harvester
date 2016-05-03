<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city_us".
 *
 * @property integer $id
 * @property string $name
 * @property string $state
 * @property double $lon
 * @property double $lat
 * @property string $created_at
 * @property string $updated_at
 */
class CityUs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city_us';
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
            [['lon', 'lat'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'state'], 'string', 'max' => 255],
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
            'state' => 'State',
            'lon' => 'Lon',
            'lat' => 'Lat',
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
            return null;
        }
    }
}
