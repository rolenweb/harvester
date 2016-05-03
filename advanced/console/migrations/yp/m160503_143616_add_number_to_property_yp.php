<?php

use yii\db\Migration;

/**
 * Handles adding number to table `property_yp`.
 */
class m160503_143616_add_number_to_property_yp extends Migration
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
        $this->addColumn('property', 'number', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('property', 'number');
    }
}
