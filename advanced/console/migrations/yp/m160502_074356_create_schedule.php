<?php

use yii\db\Migration;

/**
 * Handles the creation for table `schedule`.
 */
class m160502_074356_create_schedule extends Migration
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
        $this->createTable('schedule', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'key_id' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(5),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('schedule');
    }
}
