<?php namespace WowApi\Components\Challenges;

use WowApi\Components\BaseComponent;

/**
 * Represents a single ChallengeMap
 *
 * @package     Components
 * @author      Chris O'Brien
 * @version     1.0.0
 */
class ChallengeMap extends BaseComponent {

    /**
     * @var int $id
     */
    public $id;

    /**
     * @var string $name
     */
    public $name;

    /**
     * @var string $slug
     */
    public $slug;

    /**
     * @var bool $hasChallengeMode
     */
    public $hasChallengeMode;

    /**
     * @var object $bronzeCriteria
     */
    public $bronzeCriteria;

    /**
     * @var object $silverCriteria
     */
    public $silverCriteria;

    /**
     * @var object $goldCriteria
     */
    public $goldCriteria;

    /**
     * ChallengeMap constructor - creates the ChallengeMap object based on the returned service data
     *
     * @param object $jsonData
     * @return ChallengeMap
     */
    public function __construct($jsonData) {
        $challengeMapObj = parent::assignValues($this, $jsonData);
        return $this->getChallengeTimeCriteria($challengeMapObj);
    }

    /**
     * @var object $challengeObj
     * @return ChallengeMap
     */
    private function getChallengeTimeCriteria($challengeObj) {
        $challengeObj->bronzeCriteria = new ChallengeTime($challengeObj->bronzeCriteria);
        $challengeObj->silverCriteria = new ChallengeTime($challengeObj->silverCriteria);
        $challengeObj->goldCriteria = new ChallengeTime($challengeObj->goldCriteria);

        return $challengeObj;
    }

}