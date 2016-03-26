<?php

/**
 * Client Unit Tests
 *
 * @author		Chris O'Brien <chris@diobie.com>
 * @version     1.0.0
 */
class ClientTest extends PHPUnit_Framework_TestCase {

    public function testGetClient() {
        $client = API::getClient();
        $this->assertInstanceOf('\WoWApi\WowApi', $client);
    }

    public function testGetGuzzleClient() {
        $client = new \GuzzleHttp\Client();
        $this->assertInstanceOf('\GuzzleHttp\Client', $client);
    }

    /**
     * @expectedException \WowApi\Exceptions\WowApiException
     */
    public function testCharacterNotFound() {
        $this->_access->getCharacter('FakeRealm', 'FakeChar');
    }

}