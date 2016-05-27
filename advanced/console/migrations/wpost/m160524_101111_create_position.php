<?php

use yii\db\Migration;

/**
 * Handles the creation for table `position`.
 */
class m160524_101111_create_position extends Migration
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
        $this->createTable('position', [
            'id' => $this->primaryKey(),
            'setting_id' => $this->integer(),
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
