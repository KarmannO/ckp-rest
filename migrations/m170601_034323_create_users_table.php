<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m170601_034323_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'password_reset_token' => $this->string(255)->unique(),
            'role' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'first_name' => $this->string(255)->notNull(),
            'middle_name' => $this->string(255)->notNull(),
            'second_name' => $this->string(255)->notNull(),
            'degree' => $this->integer()->notNull(),
            'position' => $this->integer()->notNull(),
            'rank' => $this->integer()->notNull()
        ]);

        $this->createIndex(
            'users_degree_index',
            'users',
            'degree',
            false
        );
        $this->addForeignKey(
            'users_degree_fk',
            'users',
            'degree',
            'degrees',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'users_position_index',
            'users',
            'position',
            false
        );
        $this->addForeignKey(
            'users_position_fk',
            'users',
            'position',
            'positions',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'users_rank_index',
            'users',
            'rank',
            false
        );
        $this->addForeignKey(
            'users_rank_fk',
            'users',
            'rank',
            'ranks',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('users_degree_fk', 'users');
        $this->dropIndex('users_degree_index', 'users');

        $this->dropForeignKey('users_position_fk', 'users');
        $this->dropIndex('users_position_index', 'users');

        $this->dropForeignKey('users_rank_fk', 'users');
        $this->dropIndex('users_rank_index', 'users');

        $this->dropTable('users');
    }
}
