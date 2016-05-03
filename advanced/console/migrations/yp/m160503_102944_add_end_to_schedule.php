<?php

use yii\db\Migration;

/**
 * Handles adding end to table `schedule`.
 */
class m160503_102944_add_end_to_schedule extends Migration
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
        $this->addColumn('schedule', 'end', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('schedule', 'end');
    }
}
