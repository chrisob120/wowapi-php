<?php namespace WowApi\Services;

use WowApi\Components\Characters\Character;
use WowApi\Components\Resources\Talents\Spec;
use GuzzleHttp\Exception\ClientException;
use WowApi\Exceptions\WowApiException;

/**
 * User services - Utilizes OAuth2 token
 *
 * @package     Services
 * @author      Chris O'Brien
 * @version     1.0.0
 */
class UserService extends BaseService {

    /**
     * @var null|string $_accessToken
     */
    private $_accessToken = null;

    /**
     * UserService constructor
     *
     * @param string $apiKey
     * @param array|null $options
     * @throws WowApiException
     */
    public function __construct($apiKey, $options = null) {
        parent::__construct($apiKey, $options);

        if (isset($options['access_token'])) $this->_accessToken = $options['access_token'];
    }

    /**
     * Check for a token on each call
     *
     * @return void
     * @throws WowApiException
     */
    private function checkToken() {
        if ($this->_accessToken != null) {
            $this->setHeaders($this->_accessToken);
        } else {
            throw parent::toWowApiException(['This service requires an access token.', 110]);
        }
    }

    /**
     * Get user Profile
     *
     * @return array
     * @throws WowApiException
     */
    public function getProfile() {
        $this->checkToken();
        $request = parent::createRequest('GET', 'user/characters');

        try {
            $response = parent::doRequest($request);
        } catch (ClientException $e) {
            throw parent::toWowApiException($e);
        }

        return $this->getCharacters($response->getBody());
    }

    /**
     * Get the user id
     *
     * @return mixed
     * @throws WowApiException
     */
    public function getUserAccountId() {
        $this->checkToken();
        $request = parent::createRequest('GET', 'user/id', $account = true);

        try {
            $response = parent::doRequest($request);
        } catch (ClientException $e) {
            throw parent::toWowApiException($e);
        }

        $response = json_decode($response->getBody());

        if (isset($response->id)) {
            return $response->id;
        } else {
            throw parent::toWowApiException(['User id not found.', 404]);
        }
    }

    /**
     * Get the user battletag
     *
     * @return mixed
     * @throws WowApiException
     */
    public function getUserBattletag() {
        $this->checkToken();
        $request = parent::createRequest('GET', 'user/battletag', $account = true);

        try {
            $response = parent::doRequest($request);
        } catch (ClientException $e) {
            throw parent::toWowApiException($e);
        }

        $response = json_decode($response->getBody());
        if (isset($response->battletag)) {
            return $response->battletag;
        } else {
            throw parent::toWowApiException(['Battletag not found.', 404]);
        }
    }

    /**
     * @param array $characterArr
     * @return array
     */
    private function getCharacters($characterArr = []) {
        $characterArr = json_decode($characterArr)->characters;
        $returnArr = [];

        if (count($characterArr)) {
            $cnt = 0;

            foreach ($characterArr as $characterObj) {
                $returnArr[$cnt] = new Character(json_encode($characterObj));

                // add extra Character object features
                if (isset($characterArr[$cnt]->spec)) $returnArr[$cnt]->spec = new Spec(json_encode($characterArr[$cnt]->spec));
                if (isset($characterArr[$cnt]->guild)) $returnArr[$cnt]->guild = $characterArr[$cnt]->guild;
                if (isset($characterArr[$cnt]->guildRealm)) $returnArr[$cnt]->guildRealm = $characterArr[$cnt]->guildRealm;

                $cnt++;
            }
        }

        return $returnArr;
    }

}