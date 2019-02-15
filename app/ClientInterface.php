<?php 

namespace App;

interface ClientInterface {
    public function get(string $url, array $params = []);
}