<?php

use yii\db\Migration;

/**
 * Handles the creation of table `positions`.
 */
class m170601_033713_create_positions_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('positions', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->unique()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('positions');
    }
}
