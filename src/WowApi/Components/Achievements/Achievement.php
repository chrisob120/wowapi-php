<?php namespace WowApi\Components\Achievements;

use WowApi\Components\BaseComponent;
use WowApi\Components\Items\Item;

/**
 * Represents a single Achievement
 *
 * @package     Components
 * @author      Chris O'Brien
 * @version     1.0.0
 */
class Achievement extends BaseComponent {

    /**
     * @var int $id
     */
    public $id;

    /**
     * @var string $title
     */
    public $title;

    /**
     * @var int $points
     */
    public $points;

    /**
     * @var string $description
     */
    public $description;

    /**
     * @var string $reward
     */
    public $reward;

    /**
     * @var array $rewardItems
     */
    public $rewardItems;

    /**
     * @var string $icon
     */
    public $icon;

    /**
     * @var array $criteria
     */
    public $criteria;

    /**
     * @var bool $accountWide
     */
    public $accountWide;

    /**
     * @var int $factionId
     */
    public $factionId;

    /**
     * Achievement constructor - creates the Achievement object based on the returned service data
     *
     * @param string $jsonData
     * @return Achievement
     */
    public function __construct($jsonData) {
        $achievement = parent::assignValues($this, json_decode($jsonData));
        $achievement->rewardItems = $this->getAchievementItems($achievement->rewardItems);


        return $achievement;
    }

    /**
     * @param array $itemArr
     * @return array
     */
    private function getAchievementItems($itemArr = []) {
        $returnArr = [];

        foreach ($itemArr as $itemObj) {
            $returnArr[] = new Item(json_encode($itemObj));
        }

        return $returnArr;
    }

}