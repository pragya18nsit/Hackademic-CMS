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
     public function validateEmail($email = '') {
        $hostname = '(?:[a-z0-9][-a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,4}|museum|travel)';
        $pattern = '/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@' . $hostname . '$/i';
        return preg_match($pattern, $email);
    }
}
