<?php
	
	require('vendor\autoload.php');
	require('consts.php');
	
	class uploadTest extends PHPUnit_Framework_TestCase
	{
		protected $client;
		
		protected function setUp()
		{
			$this->client = new GuzzleHttp\Client(
			['base_uri' => 'http://localhost']);
		}
		
		
		public function testSendFile()
		{
			$response = $this->client->request('POST', '/api/',
			['multipart' => [
					[
						'name'     => 'userfile',
						'contents' => fopen(TEST_FILE_DIR . 'test.txt', 'r')
					]
				]
			]);
			
	
			$body = (string) $response->getBody();
			$this->assertEquals(200, $response->getStatusCode());
			$this->assertEquals(CODE_201, $body);
		}
		
		public function testRewrite()
		{
			$response = $this->client->request('POST', '/api/?rewrite',
			['multipart' => [
					[
						'name'     => 'userfile',
						'contents' => fopen(TEST_FILE_DIR . 'test.txt', 'r')
					]
				]
			]);
			
	
			$body = (string) $response->getBody();
			$this->assertEquals(200, $response->getStatusCode());
			$this->assertEquals(CODE_201, $body);
		}
		
	}
	
	
?>