<?php
/**
 *
 * hackademic/admin/controller/class.UserManagerController.php
 *
 * User Manager Controller
 *
 */
require_once(HACKADEMIC_PATH."/model/common/class.User.php");
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");

class UserManagerController extends HackademicBackendController {
	
    
    public function go() {
	if (isset($_GET['source']) && $_GET['source']=="del"){
        $this->addSuccessMessage("User has been deleted succesfully");
        } elseif (isset($_GET['source']) && $_GET['source']=="add"){
        $this->addSuccessMessage("User has been added succesfully");
        }
	
	$limit = 3; 
	$total_pages = User::getNumberOfUsers();
	$targetpage = "http://localhost/hackademic/admin/pages/usermanager.php";
	$stages = 3;
	$page=0;
	if(isset($_GET['page'])) {
	    $page=$_GET['page'];
	}
	if($page) {
	    $start = ($page - 1) * $limit; 
	} else {
	    $start = 0;
	}	
	
	// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;					
	
        $pagination = array (
            'lastpage' => $lastpage,
            'page' => $page,
            'targetpage' => $targetpage,
            'prev' => $prev,
            'next' => $next,
            'stages' => $stages,
            'last_page_m1' => $LastPagem1
        );
	
        $users = User::getNUsers($start, $limit);
	$this->addToView('users', $users);
	$this->addToView('total_pages', $total_pages);
	$this->addToView('pagination', $pagination);
	$this->setViewTemplate('usermanager.tpl');
	$this->generateView();
    }
}