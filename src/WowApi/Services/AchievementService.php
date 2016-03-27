<?php namespace WowApi\Services;

use WowApi\Components\Achievement;
use GuzzleHttp\Exception\ClientException;
use WowApi\Exceptions\WowApiException;

/**
 * Achievement services
 *
 * @package     Services
 * @author      Chris O'Brien <chris@diobie.com>
 * @version     1.0.0
 */
class AchievementService extends BaseService {

    /**
     * Get achievement service
     *
     * @param int $achievementId
     * @return Achievement
     * @throws WowApiException
     */
    public function getAchievement($achievementId) {
        
        $url = $this->getPath(sprintf('achievement/%s', (int)$achievementId));

        $request = parent::createRequest('GET', $url);

        try {
            $response = parent::doRequest($request);
        } catch (ClientException $e) {
            throw parent::toWowApiException($e);
        }

        return new Achievement($response->getBody());
    }
}