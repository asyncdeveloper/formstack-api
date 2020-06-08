<?php

namespace Tests\Feature;

use App\Core\Database;
use App\Models\User;
use Dotenv\Dotenv;
use GuzzleHttp\Client;
use Illuminate\Database\Schema\Blueprint;
use PHPUnit\Framework\TestCase;

class CRUDUsersTest extends TestCase
{

    protected $client;
    protected $schema;
    protected $database;

    protected function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)), '.env.testing');
        $dotenv->load();

        $database = new Database();
        $this->schema = $database->schema;
        $this->database = $database->capsule;

        $this->schema->dropAllTables();

        $this->schema->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('age');
            $table->text('address');
            $table->timestamps();
        });

        $this->client = new Client([
          'headers' => ['Accept' => 'application/json'],
          'base_uri' => $_ENV['APP_URL']
        ]);
    }

    public function testCanViewAllUsers()
    {
        $userData = [
          'name' => 'Oluwaseyi Samuel',
          'age' => 90,
          'address' => 'Lagos, Nigeria'
        ];

        User::create($userData);

        $response = $this->client->get('/api/users');

        $data = $response->getBody()->getContents();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data, $userData);

    }

    protected function tearDown(): void
    {
        $this->schema->dropAllTables();
    }

}
