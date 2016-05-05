<?php

use yii\db\Migration;

/**
 * Handles the creation for table `property`.
 */
class m160502_075448_create_property extends Migration
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
        $this->createTable('property', [
            'id' => $this->primaryKey(),
            'key_id' => $this->integer(),
            'city_id' => $this->integer(),
            'property_type_id' => $this->integer(),
            'value' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('property');
    }
}
