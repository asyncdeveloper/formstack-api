<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{

    public function up()
    {
        $table = $this->table('users');

        $table->addColumn('name', 'string', ['limit' => 191])
          ->addColumn('age', 'integer')
          ->addColumn('address', 'text')
          ->addColumn('created_at', 'datetime')
          ->addColumn('updated_at', 'datetime')
          ->create();
    }

    public function down()
    {
        $this->table('users')->drop()->save();
    }
}
