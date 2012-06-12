<?php
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");
require_once(HACKADEMIC_PATH."model/common/class.User.php");
require_once(HACKADEMIC_PATH."model/common/class.Mailer.php");
require_once(HACKADEMIC_PATH."model/common/class.Utils.php");
class AddUserController extends HackademicBackendController {
              public function go(){           
	          $this->setViewTemplate('adduser.tpl');
                  
		  if (isset($_POST['submit'])){
	            if ($_POST['username']=='') {
			    $this->addErrorMessage("Username should not be empty");
		    } elseif ($_POST['password']=='') {
			    $this->addErrorMessage("Password should not be empty");
		    } elseif ($_POST['first_name']=='') {
			    $this->addErrorMessage("First name should not be empty");
		    } elseif ($_POST['last_name']=='') {
			    $this->addErrorMessage("Last name should not be empty");
		    } elseif ($_POST['is_admin']=='') {
			    $this->addErrorMessage("Is user an administrator?");
		    }  elseif ($_POST['email']=='') {
			    $this->addErrorMessage("please enter ur email id");	    
	                   } else {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
	            $first_name = $_POST['first_name'];
		    $email=$_POST['email'];
	            $last_name = $_POST['last_name'];
	            $is_admin = $_POST['is_admin'];
		    if (User::doesUserExist($username)) {
			    $this->addErrorMessage("Username already exists");
		    }
		 /*   elseif(!Utils::validate_email($email)){
				$this->addErroressage("Incorrect email id");
		    }
		 */  else {
			    $subject="Hackademic new account";
			    $message="Hackademic account created succesfully";
			    Mailer::mail($email,$subject,$message);
			    $result = User::addUser($username,$password,$first_name,$last_name,$is_admin,$email);
			    $this->addSuccessMessage("User has been added succesfully");
		    }
		    }
	     }
	     return $this->generateView();
}
}