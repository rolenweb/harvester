<?php

use yii\db\Migration;

/**
 * Handles adding type_column to table `setting_table`.
 */
class m160715_112205_add_type_column_to_setting_table extends Migration
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
        $this->addColumn('setting', 'type', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('setting', 'type');
    }
}
