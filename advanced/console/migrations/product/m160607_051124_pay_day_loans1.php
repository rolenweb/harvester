<?php

use yii\db\Migration;

class m160607_051124_pay_day_loans1 extends Migration
{
    public function init()
    {
        $this->db = 'db4';
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('pay_day_loans1', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'street_address' => $this->string(),
            'city_state' => $this->string(),
            'phone' => $this->string(),
            'website' => $this->string(),
            'open_details' => $this->string(),
            'description' => $this->string(),
            'extra_phones' => $this->string(),
            'years_in_business' => $this->string(),
            'brands' => $this->string(),
            'payment' => $this->string(),
            'categories' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        echo "m160607_051124_pay_day_loans1 cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
