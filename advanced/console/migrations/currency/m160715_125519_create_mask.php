<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mask`.
 */
class m160715_125519_create_mask extends Migration
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
        $this->createTable('mask', [
            'id' => $this->primaryKey(),
            'mask' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('mask');
    }
}
