<?php

use yii\db\Migration;

/**
 * Handles the creation for table `forecast_income`.
 */
class m160615_061730_create_forecast_income extends Migration
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
        $this->createTable('forecast_income', [
            'id' => $this->primaryKey(),
            'domain_id' => $this->integer(),
            'income' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('forecast_income');
    }
}
