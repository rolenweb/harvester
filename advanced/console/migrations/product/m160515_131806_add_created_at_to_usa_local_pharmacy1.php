<?php

use yii\db\Migration;

/**
 * Handles adding created_at to table `usa_local_pharmacy1`.
 */
class m160515_131806_add_created_at_to_usa_local_pharmacy1 extends Migration
{

    public function init()
    {
        $this->db = 'db4';
        parent::init();
    }
    /**
     * @inheritdoc
     */


    public function up()
    {
        $this->addColumn('usa_local_pharmacy1', 'created_at', $this->integer());
        $this->addColumn('usa_local_pharmacy1', 'updated_at', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('usa_local_pharmacy1', 'created_at');
    }
}
