<?php

use yii\db\Migration;

/**
 * Handles the creation for table `position`.
 */
class m160502_073834_create_position extends Migration
{
    public function init()
    {
        $this->db = 'db2';
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('position', [
            'id' => $this->primaryKey(),
            'key_id' => $this->integer(),
            'start' => $this->integer(),
            'current' => $this->integer(),
            'end' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
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
