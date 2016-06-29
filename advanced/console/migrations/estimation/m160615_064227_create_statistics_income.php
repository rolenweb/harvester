<?php

use yii\db\Migration;

/**
 * Handles the creation for table `statistics_income`.
 */
class m160615_064227_create_statistics_income extends Migration
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
        $this->createTable('statistics_income', [
            'id' => $this->primaryKey(),
            'domain_id' => $this->integer(),
            'month' => $this->datetime(),
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
        $this->dropTable('statistics_income');
    }
}
