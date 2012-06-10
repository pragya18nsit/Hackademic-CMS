<?php
/**
 *
 * hackademic/model/class.Session.php
 *
 * Session
 *
 * The object that manages logged-in Hackademic users' sessions via the web.
 *
 */
class Session {
    
    /**
     * @return bool Is user logged into SocialCalc
     */
    public static function isLoggedIn() {
	if (isset($_SESSION['hackademic_user'])) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * @return bool Is user logged into Hackademic an admin
     */
    public static function isAdmin() {
	if (isset($_SESSION['hackademic_user_is_admin'])){
    	    return true;
	} else {	
	    return false; 
	}	       
    }
    
    /**
     * Complete login action
     * @param Owner $owner
    */
    public static function completeLogin($owner) {
	$_SESSION['hackademic_user'] = $owner->username;
        $_SESSION['hackademic_user_is_admin'] = $owner->is_admin;
    }
	   /**
     * Check password
     * @param str $pwd Password
     * @param str $result Result
     * @return bool Whether or submitted password matches check
     */
    public function pwdCheck($pwd, $result) {
        if ($this->sha1pwd($pwd) == $result || $this->md5pwd($pwd) == $result) {
            return true;
        } else {
            return false;
        }
    }
	 /**
     *
     * @param str $pwd Password
     * @return str MD5-hashed password
     */
    public function md5pwd($pwd) {
        return md5($pwd);
    }

    /**
     *
     * @param str $pwd Password
     * @return str SHA1-hashed password
     */
    private function sha1pwd($pwd) {
        return sha1($pwd);
    }
/**
     * @return str Currently logged-in SocialCalc username (email address)
     */
    public static function getLoggedInUser() {
        if (self::isLoggedIn()) {
            return $_SESSION['hackademic_user'];
        } else {
            return null;
        }
    }

    /**
     * Log out
     */
    public static function logout() {
	unset($_SESSION['hackademic_user']);
        unset($_SESSION['hackademic_user_is_admin']);
        session_destroy();      
    }
}