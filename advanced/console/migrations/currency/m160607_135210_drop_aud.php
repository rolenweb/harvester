<?php

use yii\db\Migration;

/**
 * Handles the dropping for table `aud`.
 */
class m160607_135210_drop_aud extends Migration
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
        $this->dropTable('aud');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->createTable('aud', [
            'id' => $this->primaryKey(),
        ]);
    }
}
