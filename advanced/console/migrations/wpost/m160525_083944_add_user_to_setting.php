<?php

use yii\db\Migration;

/**
 * Handles adding user to table `setting`.
 */
class m160525_083944_add_user_to_setting extends Migration
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
        $this->addColumn('setting', 'user', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
