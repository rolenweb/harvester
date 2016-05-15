<?php

use yii\db\Migration;

/**
 * Handles the creation for table `usa_local_pharmacy1`.
 */
class m160513_082446_create_usa_local_pharmacy1 extends Migration
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
        $this->createTable('usa_local_pharmacy1', [
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
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('usa_local_pharmacy1');
    }
}
