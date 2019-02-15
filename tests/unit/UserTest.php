<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\User;
use App\Guzzle;

final class UserTest extends TestCase
{
    protected $user;

    protected function setUp()
    {
        $this->user = new User(new Guzzle);
    }

    public function testWeCanConnectToTheApi(): void 
    {
        $users = $this->user->getUsers();
        $this->assertEquals($users->getStatus(), 200);
    }

    public function testWeCanGetAListOfUsers(): void
    {
        $users = $this->user->getUsers();
        $foundUsers = $users->getBody()->data;
        $this->assertTrue(count($foundUsers) > 0);
    }

    public function testAnUnknownUserWillThrowAnException(): void
    {
        $this->expectException(\GuzzleHttp\Exception\ClientException::class);
        $user = $this->user->getUser(24);
        $this->assertTrue($user->getStatus() === 404);
    }
}