<?php

use yii\db\Migration;

/**
 * Handles the creation for table `statistics_cost`.
 */
class m160615_064852_create_statistics_cost extends Migration
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
        $this->createTable('statistics_cost', [
            'id' => $this->primaryKey(),
            'domain_id' => $this->integer(),
            'month' => $this->datetime(),
            'cost' => $this->float(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('statistics_cost');
    }
}
