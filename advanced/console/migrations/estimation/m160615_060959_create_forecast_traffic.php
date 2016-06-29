<?php

use yii\db\Migration;

/**
 * Handles the creation for table `forecast_traffic`.
 */
class m160615_060959_create_forecast_traffic extends Migration
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
        $this->createTable('forecast_traffic', [
            'id' => $this->primaryKey(),
            'domain_id' => $this->integer(),
            'traffic' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('forecast_traffic');
    }
}
