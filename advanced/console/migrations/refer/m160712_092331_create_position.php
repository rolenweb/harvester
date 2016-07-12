<?php

use yii\db\Migration;

/**
 * Handles the creation for table `position`.
 */
class m160712_092331_create_position extends Migration
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
        $this->createTable('position', [
            'id' => $this->primaryKey(),
            'domain_id' => $this->integer(),
            'url_id' => $this->integer(),
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
        $this->dropTable('position');
    }
}
