<?php

use yii\db\Migration;

class m160617_081805_rename_income_to_forecast_cost extends Migration
{

    public function init()
    {
        $this->db = 'db7';
        parent::init();
    }
    
    public function up()
    {
        $this->renameColumn('forecast_cost','income','cost');
    }

    public function down()
    {
        echo "m160617_081805_rename_income_to_forecast_cost cannot be reverted.\n";

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
