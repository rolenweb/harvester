<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "usa_local_pharmacy1".
 *
 * @property integer $id
 * @property string $title
 * @property string $street_address
 * @property string $city_state
 * @property string $phone
 * @property string $website
 * @property string $open_details
 * @property string $description
 * @property string $extra_phones
 * @property string $years_in_business
 * @property string $brands
 * @property string $payment
 * @property string $categories
 */
class UsaLocalPharmacy1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usa_local_pharmacy1';
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
        return Yii::$app->get('db4');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'street_address', 'city_state', 'phone', 'website', 'open_details', 'description', 'extra_phones', 'years_in_business', 'brands', 'payment', 'categories'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'street_address' => 'Street Address',
            'city_state' => 'City State',
            'phone' => 'Phone',
            'website' => 'Website',
            'open_details' => 'Open Details',
            'description' => 'Description',
            'extra_phones' => 'Extra Phones',
            'years_in_business' => 'Years In Business',
            'brands' => 'Brands',
            'payment' => 'Payment',
            'categories' => 'Categories',
        ];
    }
}
