<?php
/**
 *
 * Hackademic Controller
 *
 * The parent class of all Hackademic webapp controllers.
 *
 */
require_once(HACKADEMIC_PATH."model/common/class.SmartyHackademic.php");
require_once(HACKADEMIC_PATH."model/common/class.Session.php");
require_once(HACKADEMIC_PATH."controller/class.FrontendMenuController.php");

abstract class HackademicController {
    
    /**
     * @var Smarty Object
     */
    protected $smarty;
    
    /**
     * @var template path
     */
    protected $tmpl;
    
    /**
     * @var view template
     */
    protected $view_template;
    
    /**
     * @var array
     */
    protected $header_scripts = array ();
    
    /**
     * @var session_exists
     */
    private static $session_exists;
        
    /**
     * @var app_session
     */
    private $app_session;
    
    /**
     * Constructor to initialize the Main Controller
     */
    public function __construct() {
	if (!self::$session_exists) {
            self::$session_exists = 1;
            session_start();
        }
       
        $this->smarty = new SmartyHackademic(); 
        $this->app_session = new Session(); 
	if ($this->isLoggedIn()) {
            $this->addToView('is_logged_in', true);
            $this->addToView('logged_in_user', $this->getLoggedInUser());
        }
        if ($this->isAdmin()) {
            $this->addToView('user_is_admin', true);
        }
	if (get_class($this) == 'LoginController');
        elseif (!$this->isLoggedIn()) {
            // Else if not logged in, go to login page
            header('Location: '.SOURCE_ROOT_PATH."pages/login.php");
        } else {
            $menu=FrontendMenuController::go();
	    $this->addToView('main_menu',$menu);   
	    
        }
    }
    
    /**
     * Add javascript to header
     *
     * @param str javascript path
     */
    public function addHeaderJavaScript($script) {
        array_push($this->header_scripts, $script);
    }
	
    /**
     * Set Page Title
     * @param $title str Page Title
     */
    public function addPageTitle($title) {
        self::addToView('controller_title', $title);
    }
    
    /**
     * Function to set view template
     * @param $tmpl str Template name
     */
    public function setViewTemplate($tmpl) {
	$this->view_template = HACKADEMIC_PATH.'view/'.$tmpl;
   
    }
    
    /**
     * Generate View In Smarty
     */
    public function generateView() {
        $view_path = $this->view_template;
	$this->addToView('header_scripts', $this->header_scripts);
        return $this->smarty->display($view_path);
    }
        
    /**
     * Add error message to view
     * @param str $msg
     */
    public function addErrorMessage($msg) {
        $this->disableCaching();
        $this->addToView('errormsg', $msg );
    }

    /**
     * Add success message to view
     * @param str $msg
     */
    public function addSuccessMessage($msg) {
        $this->disableCaching();
        $this->addToView('successmsg', $msg );
    }
    
    
    /**
     * Disable Caching
     */
    protected function disableCaching() {
        $this->smarty->disableCaching();
    }
    
    /**
     * Returns whether or not Hackademic user is logged in
     *
     * @return bool whether or not user is logged in
     */
    protected function isLoggedIn() {
        return Session::isLoggedIn();
    }
	
    /**
     * Function to add data to Smarty Template
     * @param $key str Variable name in Smarty
     * @param $value str Variable value in Smarty
     */
    public function addToView($key,$value) {
        $this->smarty->assign($key, $value);
    }

    /**
     * Returns whether or not a logged-in Hackademic user is an admin
     *
     * @return bool whether or not logged-in user is an admin
     */
    protected function isAdmin() {
        return Session::isAdmin();
    }

    /**
     * Return email address of logged-in user
     *
     * @return str email
     */
    protected function getLoggedInUser() {
        return Session::getLoggedInUser();
    }
}