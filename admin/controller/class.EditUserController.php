<?php
/**
 *
 * Controller2
 *
 * Create Hackademic Main Menu
 *
 */
 require_once(HACKADEMIC_PATH."model/common/class.User.php");
 require_once(HACKADEMIC_PATH."model/common/class.HackademicDB.php");
 require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");
 class EditUserController extends HackademicBackendController {
    
    public function go() {
      if (isset($_GET['id']))
     {
        $id=$_GET['id'];
     }
                       if(isset($_POST['submit'])){
                       if ($_POST['username']=='') {
			    $this->addErrorMessage("Name of the user should not be empty"); 
                       }elseif ($_POST['email']=='') {
			    $this->addErrorMessage("Email should not be empty");
	               }elseif ($_POST['full_name']=='') {
			    $this->addErrorMessage("Please enter your full name");
	               }elseif ($_POST['is_activated']=='') {
			    $this->addErrorMessage("Is the user activated or not");
	               }elseif ($_POST['is_admin']=='') {
			    $this->addErrorMessage("Is the user administrator or not");
	               }else {
                            $this->username =$_POST['username'];
	                    $this->email = $_POST['email'];
			    $this->password = $_POST['password'];
                            $this->full_name=$_POST['full_name'];
			    $this->is_activated=$_POST['is_activated'];
			    $this->is_admin=$_POST['is_admin'];
                            
                            User::updateUser($id,$this->username,$this->full_name,$this->email,$this->password,$this->is_activated,$this->is_admin);
                            $this->addSuccessMessage("User details have been updated succesfully");
			   }
                      }
		      
			    $users=User::getUser($id);
			    $this->setViewTemplate('edituser.tpl');
			    $this->addToView('user', $users[0]);
                            $this->generateView();
		        if(isset($_POST['deletesubmit'])){
                            User::deleteUser($id);
                            $this->addSuccessMessage("User has been deleted succesfully");


			     header('Location:'.SOURCE_ROOT_PATH."admin/pages/usermanager.php?source=del");
	                    }  
        

                    }
               }