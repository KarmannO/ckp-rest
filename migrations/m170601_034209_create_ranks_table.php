<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ranks`.
 */
class m170601_034209_create_ranks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ranks', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->unique()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ranks');
    }
}
