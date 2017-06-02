<?php

use yii\db\Migration;

/**
 * Handles adding phone to table `users`.
 */
class m170601_041334_add_phone_column_to_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn(
            'users',
            'phone',
            $this->string('32')->notNull()->unique()
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('users', 'phone');
    }
}
