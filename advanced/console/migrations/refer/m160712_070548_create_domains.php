<?php

use yii\db\Migration;

/**
 * Handles the creation for table `domains`.
 */
class m160712_070548_create_domains extends Migration
{

    public function init()
    {
        $this->db = 'db3';
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('domains', [
            'id' => $this->primaryKey(),
            'domain' => $this->string(),
            'url' => $this->string(),
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
        $this->dropTable('domains');
    }
}
