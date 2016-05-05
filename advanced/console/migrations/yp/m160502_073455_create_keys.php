<?php

use yii\db\Migration;

/**
 * Handles the creation for table `keys`.
 */
class m160502_073455_create_keys extends Migration
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
        $this->createTable('keys', [
            'id' => $this->primaryKey(),
            'key' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('keys');
    }
}
