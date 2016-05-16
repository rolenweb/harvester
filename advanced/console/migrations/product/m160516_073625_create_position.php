<?php

use yii\db\Migration;

/**
 * Handles the creation for table `position`.
 */
class m160516_073625_create_position extends Migration
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
        $this->createTable('position', [
            'id' => $this->primaryKey(),
            'table' => $this->string(),
            'key_id' => $this->integer(),
            'start' => $this->integer(),
            'current' => $this->integer(),
            'end' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('position');
    }
}
