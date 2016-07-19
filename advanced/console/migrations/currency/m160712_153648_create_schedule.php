<?php

use yii\db\Migration;

/**
 * Handles the creation for table `schedule`.
 */
class m160712_153648_create_schedule extends Migration
{
    public function init()
    {
        $this->db = 'db6';
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('schedule', [
            'id' => $this->primaryKey(),
            'date' => $this->datetime(),
            'cur1' => $this->string(),
            'cur2' => $this->string(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
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
