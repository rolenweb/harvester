<?php

use yii\db\Migration;

/**
 * Handles the creation for table `domain`.
 */
class m160614_070558_create_domain extends Migration
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
        $this->createTable('domain', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'project_id' => $this->integer(),
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
        $this->dropTable('domain');
    }
}
