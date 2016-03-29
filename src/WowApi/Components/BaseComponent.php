<?php namespace WowApi\Components;

/**
 * Super class for all components
 *
 * @package     Components
 * @author      Chris O'Brien
 * @version     1.0.0
 */
abstract class BaseComponent {

    /**
     * Assign the values to an object
     *
     * @param object $componentObj
     * @param object $apiObj
     * @param null $specialCheck If there are any poorly named keys from the API, use the special case array to replace on key check
     * @param null $default Default value if nothing is assigned
     * @return object;
     */
    protected static function assignValues($componentObj, $apiObj, $specialCheck = null, $default = null) {
        foreach ($componentObj as $prop => $val) {
            // check if there special conditions
            $checkProp = ($specialCheck != null && array_key_exists($prop, $specialCheck)) ? $specialCheck[$prop] : $prop;

            // update the component object
            if (isset($apiObj->$checkProp)) {
                $componentObj->$prop = $apiObj->$checkProp;
            } else {
                if ($default == 'remove') {
                    // unset the component property
                    unset($componentObj->$prop);
                } else {
                    $componentObj->$prop = $default;
                }
            }
        }

        return $componentObj;
    }

}