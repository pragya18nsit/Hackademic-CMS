<?php
/**
 *
 * hackademic/admin/controller/class.LoginController.php
 *
 * Controller for logging into backend.
 *
 */
require_once(HACKADEMIC_PATH."model/common/class.Session.php");
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");
require_once(HACKADEMIC_PATH."model/common/class.User.php");

class LoginController extends HackademicBackendController {
     
    
    public function go() {
	       
	          $this->addPageTitle('Log in');
            
			// echo $record;
    
	// $this->disableCaching();
	  if ($this->isLoggedIn()) {
            $controller = new DashboardController();
            return $controller->go();
        } else  {
            if (isset($_POST['submit']) && $_POST['submit']=='Login'
            && isset($_POST['username']) && isset($_POST['pwd']) ) {
                if ( $_POST['username']=='' || $_POST['pwd']=='') {
                    if ( $_POST['username']=='') {
                        $this->addErrorMessage("Username must not be empty");
                        return $this->generateView();
                    } else {
                        $this->addErrorMessage("Password must not be empty");
                        return $this->generateView();
                    }
                } else {
                    $session = new Session();
                    $username = $_POST['username'];
					
                    $this->addToView('username', $username);
					$user=User::findByUsername($username);
                  //  $user = $this->getDetails($username);
                    if (!$user) {
                        $this->addErrorMessage("Incorrect username");
                        return $this->generateView();
                    } elseif (!$session->pwdCheck
					($_POST['pwd'], $user->password)) {
                        $this->addErrorMessage("Incorrect password");
                        return $this->generateView();
                    } else {
                        // this sets variables in the session
                        $session->completeLogin($user);
                        $controller = new DashboardController(true);
                        return $controller->go();
                    }
                }
            } else  {
                    $this->setViewTemplate('test.tpl');
                    return $this->generateView();
                    $this->addPageTitle('Log in');
                }
            }
        }
    }

    

