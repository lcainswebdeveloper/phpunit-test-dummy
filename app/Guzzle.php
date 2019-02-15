<?php 
declare(strict_types=1);

namespace App;

class Guzzle implements ClientInterface {
    protected $client;
    protected $request;
    protected $status;

    public function __construct(){
		$this->client = new \GuzzleHttp\Client;
    }
    
    public function get(string $url, array $params = []) {
        $this->request = $this->client->request('GET', $url, $params);
        $this->fire();
    }

    protected function fire() {
        $this->status = $this->request->getStatusCode();
    }

    public function getStatus() : int {
        return $this->status;
    }

    public function getBody(): \stdClass {
        return json_decode((string) $this->request->getBody());
    }
}