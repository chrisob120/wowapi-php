<?php namespace WowApi\Services;

use Exception;

use GuzzleHttp\Exception\ServerException;
use WowApi\Components\Characters\Character;
use GuzzleHttp\Exception\ClientException;
use WowApi\Exceptions\WowApiException;
use WowApi\Util\Utilities;


/**
 * Character services
 *
 * @package     Services
 * @author      Chris O'Brien <chris@diobie.com>
 * @version     1.0.0
 */
class CharacterService extends BaseService {

    /**
     * Get character service
     *
     * @param string $realm
     * @param string $character
     * @param array $params
     * @return Character
     * @throws WowApiException
     */
    public function getCharacter($realm, $character, $params = []) {
        $this->setFields($params);
        
        $url = $this->getPath('character/:realm/:character', [
            'realm' => $realm,
            'character' => $character
        ]);

        $request = parent::createRequest('GET', $url);

        try {
            $response = parent::doRequest($request);
        } catch (ClientException $e) {
            throw parent::toWowApiException($e);
        }

        return new Character($response->getBody());
    }

}