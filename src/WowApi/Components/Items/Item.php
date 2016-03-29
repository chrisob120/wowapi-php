<?php namespace WowApi\Components\Items;

use WowApi\Components\BaseComponent;

/**
 * Represents a single Item
 *
 * @package     Components
 * @author      Chris O'Brien
 * @version     1.0.0
 */
class Item extends BaseComponent {

    /**
     * @var int $id
     */
    public $id;

    /**
     * @var string $disenchantingSkillRank
     */
    public $disenchantingSkillRank;

    /**
     * @var string $description
     */
    public $description;

    /**
     * @var string $name
     */
    public $name;

    /**
     * @var string $icon
     */
    public $icon;

    /**
     * @var bool $stackable
     */
    public $stackable;

    /**
     * @var int $itemBind
     */
    public $itemBind;

    /**
     * @var array $bonusStats
     */
    public $bonusStats;

    /**
     * @var array $itemSpells
     */
    public $itemSpells;

    /**
     * @var int $buyPrice
     */
    public $buyPrice;

    /**
     * @var int $itemClass
     */
    public $itemClass;

    /**
     * @var int $itemSubClass
     */
    public $itemSubClass;

    /**
     * @var int $containerSlots
     */
    public $containerSlots;

    /**
     * @var object $weaponInfo
     */
    public $weaponInfo;

    /**
     * @var int $inventoryType
     */
    public $inventoryType;

    /**
     * @var bool $equippable
     */
    public $equippable;

    /**
     * @var int $itemLevel
     */
    public $itemLevel;

    /**
     * @var int $maxCount
     */
    public $maxCount;

    /**
     * @var int $maxDurability
     */
    public $maxDurability;

    /**
     * @var int $minFactionId
     */
    public $minFactionId;

    /**
     * @var int $minReputation
     */
    public $minReputation;

    /**
     * @var int $quality
     */
    public $quality;

    /**
     * @var int $sellPrice
     */
    public $sellPrice;

    /**
     * @var int $requiredSkill
     */
    public $requiredSkill;

    /**
     * @var int $requiredLevel
     */
    public $requiredLevel;

    /**
     * @var int $requiredSkillRank
     */
    public $requiredSkillRank;

    /**
     * @var object $itemSource
     */
    public $itemSource;

    /**
     * @var int $baseArmor
     */
    public $baseArmor;

    /**
     * @var bool $hasSockets
     */
    public $hasSockets;

    /**
     * @var bool $isAuctionable
     */
    public $isAuctionable;

    /**
     * @var int $armor
     */
    public $armor;

    /**
     * @var int $displayInfoId
     */
    public $displayInfoId;

    /**
     * @var string $nameDescription
     */
    public $nameDescription;

    /**
     * @var string $nameDescriptionColor
     */
    public $nameDescriptionColor;

    /**
     * @var bool $upgradable
     */
    public $upgradable;

    /**
     * @var bool $heroicTooltip
     */
    public $heroicTooltip;

    /**
     * @var string $context
     */
    public $context;

    /**
     * @var array $bonusLists
     */
    public $bonusLists;

    /**
     * @var array $availableContexts
     */
    public $availableContexts;

    /**
     * @var object $bonusSummary
     */
    public $bonusSummary;


    /**
     * Item constructor - creates the Item object based on the returned service data
     *
     * @param string $jsonData
     * @return Item
     */
    public function __construct($jsonData) {
        return parent::assignValues($this, json_decode($jsonData), null, $default = 'remove');
    }

}