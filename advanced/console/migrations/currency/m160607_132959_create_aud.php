<?php

use yii\db\Migration;

/**
 * Handles the creation for table `aud`.
 */
class m160607_132959_create_aud extends Migration
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
        $this->createTable('aud', [
            'id' => $this->primaryKey(),
            'date' => $this->datetime(),
            'code' => $this->string(),
            'rate' => $this->float(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('aud');
    }
}
