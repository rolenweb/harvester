<?php

use yii\db\Migration;

/**
 * Handles the creation for table `wp_table`.
 */
class m161003_155753_create_wp_table extends Migration
{
    public function init()
    {
        $this->db = 'db9';
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('wp_table', [
            'id' => $this->primaryKey(),
            'url' => $this->string(),
            'login' => $this->string(),
            'password' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('wp_table');
    }
}
