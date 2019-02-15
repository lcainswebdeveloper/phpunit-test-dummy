<?php
declare(strict_types=1);

namespace App;

class User 
{
    public $client;
    public function __construct(ClientInterface $client) 
    {
        $this->client = $client;
    }

    public function getUsers() {
        $this->client->get('https://reqres.in/api/users');
        return $this->client;
    }

    public function getUser($id) {
        $this->client->get('https://reqres.in/api/users/' . $id);
        return $this->client;
    }
}