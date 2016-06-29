<?php

use yii\db\Migration;

/**
 * Handles the creation for table `usaloans`.
 */
class m160626_101409_create_usaloans extends Migration
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
        $this->createTable('usaloans', [
            'id' => $this->primaryKey(),
            'key' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('usaloans');
    }
}
