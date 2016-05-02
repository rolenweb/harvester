<?php

use yii\db\Migration;

/**
 * Handles the creation for table `city_us`.
 */
class m160502_072007_create_city_us extends Migration
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
        $this->createTable('city_us', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'state' => $this->string(),
            'lon' => $this->float(),
            'lat' => $this->float(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('city_us');
    }
}
