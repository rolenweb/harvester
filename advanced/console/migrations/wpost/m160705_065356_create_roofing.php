<?php

use yii\db\Migration;

/**
 * Handles the creation for table `roofing`.
 */
class m160705_065356_create_roofing extends Migration
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
        $this->createTable('roofing', [
            'id' => $this->primaryKey(),
            'key' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('roofing');
    }
}
