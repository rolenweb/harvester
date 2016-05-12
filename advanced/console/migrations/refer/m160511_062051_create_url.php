<?php

use yii\db\Migration;

/**
 * Handles the creation for table `url`.
 */
class m160511_062051_create_url extends Migration
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
        $this->createTable('url', [
            'id' => $this->primaryKey(),
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
        $this->dropTable('url');
    }
}
