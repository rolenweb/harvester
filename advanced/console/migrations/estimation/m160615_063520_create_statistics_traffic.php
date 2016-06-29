<?php

use yii\db\Migration;

/**
 * Handles the creation for table `statistics_traffic`.
 */
class m160615_063520_create_statistics_traffic extends Migration
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
        $this->createTable('statistics_traffic', [
            'id' => $this->primaryKey(),
            'domain_id' => $this->integer(),
            'month' => $this->datetime(),
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
        $this->dropTable('statistics_traffic');
    }
}
