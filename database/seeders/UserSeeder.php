<?php


use Faker\Factory;
use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{

    public function run()
    {
        $table = $this->table('users');
        $table->truncate();

        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
              'first_name' => $faker->firstName,
              'last_name' => $faker->lastName,
              'password'=> password_hash('pass123', PASSWORD_DEFAULT),
              'email' => $faker->email,
              'avatar' => $faker->imageUrl(640, 480)
            ];
        }

        $table->insert($data)->saveData();
    }
}
