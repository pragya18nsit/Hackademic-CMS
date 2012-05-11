<?php
/**
 * Utils
 *
 * Generic, reusable, common utility methods
 *
 */

class Utils {
 
    /**
     * Define Constants function. These constants are used to locate files on the server
     */
    public static function defineConstants() {
        if ( !defined('HACKADEMIC_PATH') ) {
            define('HACKADEMIC_PATH', str_replace("\\",'/', dirname(dirname(dirname(__FILE__)))).'/');
        }
    }
}