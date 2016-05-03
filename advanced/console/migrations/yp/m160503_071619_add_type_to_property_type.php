<?php

use yii\db\Migration;

/**
 * Handles adding type to table `property_type`.
 */
class m160503_071619_add_type_to_property_type extends Migration
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
        $this->addColumn('property_type', 'type', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('property_type', 'type');
    }
}
