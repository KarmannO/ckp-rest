<?php

use yii\db\Migration;

/**
 * Handles the creation of table `organizations`.
 */
class m170601_031840_create_organizations_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('organizations', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(255)->unique(),
            'short_name' => $this->string(64),
            'fano_num' => $this->string(64)->unique(),
            'post_code' => $this->integer(),
            'post_address' => $this->string(300)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('organizations');
    }
}
