<?php namespace WowApi\Components;

/**
 * Represents a single Achievement
 *
 * @package     Components
 * @author      Chris O'Brien <chris@diobie.com>
 * @version     1.0.0
 */
class Auction extends BaseComponent {

    /**
     * @var array $files
     */
    public $files;

    /**
     * Achievement constructor - creates the achievement object based on the returned service data
     *
     * @param string $jsonData
     * @return Auction
     */
    public function __construct($jsonData) {
        return parent::assignValues($this, json_decode($jsonData));
    }

}