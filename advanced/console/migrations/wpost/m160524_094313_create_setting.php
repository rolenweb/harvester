<?php

use yii\db\Migration;

/**
 * Handles the creation for table `setting`.
 */
class m160524_094313_create_setting extends Migration
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
        $this->createTable('setting', [
            'id' => $this->primaryKey(),
            'domain' => $this->string(),
            'hash' => $this->string(),
            'keys' => $this->string(),
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
        $this->dropTable('setting');
    }
}
