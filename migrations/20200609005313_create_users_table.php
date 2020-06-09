<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{

    public function up()
    {
        $table = $this->table('users');

        $table->addColumn('first_name', 'string', ['limit' => 191])
          ->addColumn('last_name', 'string', ['limit' => 191])
          ->addColumn('password', 'string', ['limit' => 191])
          ->addColumn('email', 'string')
          ->addIndex(['email'], [
              'unique' => true,
              'name' => 'idx_users_email',
              'limit' => 191
          ])
          ->addColumn('avatar', 'string', ['limit' => 191])
          ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
          ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
          ->create();
    }

    public function down()
    {
        $this->table('users')->drop()->save();
    }
}
