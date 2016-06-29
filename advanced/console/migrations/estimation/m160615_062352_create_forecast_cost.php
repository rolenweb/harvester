<?php

use yii\db\Migration;

/**
 * Handles the creation for table `forecast_cost`.
 */
class m160615_062352_create_forecast_cost extends Migration
{

    public function init()
    {
        $this->db = 'db7';
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('forecast_cost', [
            'id' => $this->primaryKey(),
            'domain_id' => $this->integer(),
            'income' => $this->float(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('forecast_cost');
    }
}
