<?php namespace WowApi\Cache;

/**
 * Simple cache engine stored in memory for the current request
 *
 * @package     Cache
 * @author      Chris O'Brien
 * @version     1.0.0
 */
class SimpleCache extends CacheEngine {

    /**
     * Stored data
     * @var array $_data
     */
    private $_data = [];

    /**
     * SimpleCache constructor
     */
    public function __construct(){
        $this->engineName = 'Simple Cache';

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $val) {
        $this->_data[$key] = $val;
    }

    /**
     * {@inheritdoc}
     */
    public function get($key) {
        return ($this->keyExists($key)) ? $this->_data[$key] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function keyExists($key) {
        return isset($this->_data[$key]);
    }

}