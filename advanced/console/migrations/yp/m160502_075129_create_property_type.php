<?php

use yii\db\Migration;

/**
 * Handles the creation for table `property_type`.
 */
class m160502_075129_create_property_type extends Migration
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
        $this->createTable('property_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'name' => $this->string(),
            'key_id' => $this->integer(),
            'pattern' => $this->string(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('property_type');
    }
}
