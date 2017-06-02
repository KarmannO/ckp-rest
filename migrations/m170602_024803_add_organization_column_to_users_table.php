<?php

use yii\db\Migration;

/**
 * Handles adding organization to table `users`.
 */
class m170602_024803_add_organization_column_to_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('users', 'organization', $this->integer()->notNull());
        $this->createIndex('users_organization_index', 'users', 'organization', false);
        $this->addForeignKey(
            'users_organization_fk',
            'users',
            'organization',
            'organizations',
            'id',
            'CASCADE',
            'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('users_organization_fk', 'users');
        $this->dropIndex('users_organization_index', 'users');
        $this->dropColumn('users', 'organization');
    }
}
