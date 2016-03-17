<?php
	
	require('vendor\autoload.php');
	require('consts.php');
	
	class serverTest extends PHPUnit_Framework_TestCase
	{
		protected $client;
		
		protected function setUp()
		{
			$this->client = new GuzzleHttp\Client(
			['base_uri' => 'http://localhost']);
		}
		
		public function testExistFile()
		{
			$response = $this->client->get('/api/',
			['query' => ['exist' => 'test.txt']]);
			$body = $response->getBody();
			$this->assertEquals(200, $response->getStatusCode());
			$this->assertEquals(CODE_201, $body);
		}
	}
	
?>