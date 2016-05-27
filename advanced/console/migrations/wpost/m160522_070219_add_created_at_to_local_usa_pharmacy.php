<?php

use yii\db\Migration;

/**
 * Handles adding created_at to table `local_usa_pharmacy`.
 */
class m160522_070219_add_created_at_to_local_usa_pharmacy extends Migration
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
        $this->addColumn('local_usa_pharmacy', 'created_at', $this->integer());
        $this->addColumn('local_usa_pharmacy', 'updated_at', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
