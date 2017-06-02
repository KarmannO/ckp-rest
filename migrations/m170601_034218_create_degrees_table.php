<?php

use yii\db\Migration;

/**
 * Handles the creation of table `degrees`.
 */
class m170601_034218_create_degrees_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('degrees', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->unique()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('degrees');
    }
}
