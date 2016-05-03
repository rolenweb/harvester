<?php

use yii\db\Migration;

/**
 * Handles adding start to table `schedule`.
 */
class m160503_102919_add_start_to_schedule extends Migration
{
    public function init()
    {
        $this->db = 'db2';
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('schedule', 'start', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('schedule', 'start');
    }
}
