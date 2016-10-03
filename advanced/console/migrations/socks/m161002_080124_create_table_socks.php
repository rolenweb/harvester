<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_socks`.
 */
class m161002_080124_create_table_socks extends Migration
{

    public function init()
    {
        $this->db = 'db8';
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('table_socks', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(),
            'port' => $this->string(),
            'code' => $this->string(),
            'country' => $this->string(),
            'version' => $this->string(),
            'anonymity' => $this->string(),
            'https' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('table_socks');
    }
}
