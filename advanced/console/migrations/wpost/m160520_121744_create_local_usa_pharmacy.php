<?php

use yii\db\Migration;

/**
 * Handles the creation for table `local_usa_pharmacy`.
 */
class m160520_121744_create_local_usa_pharmacy extends Migration
{

    public function init()
    {
        $this->db = 'db5';
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('local_usa_pharmacy', [
            'id' => $this->primaryKey(),
            'key' => $this->string(),
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
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('local_usa_pharmacy');
    }
}
