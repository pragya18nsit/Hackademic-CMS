<?php
/**
 *
 * hackademic/admin/controller/class.ChallengeManagerController.php
 *
 * Challenge Manager Controller
 *
 */
require_once(HACKADEMIC_PATH."admin/model/class.ChallengeBackend.php");
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");

class ChallengeManagerController extends HackademicBackendController {
    
    public function go() {
         
                         if (isset($_GET["action"]) && ($_GET["action"]=="del")) {
                            $id=$_GET['id'];
                         $challenge=ChallengeBackend::getChallenge($id);
                         $title=$challenge[0]->title;
                         self::rrmdir(HACKADEMIC_PATH."challenges/".$title);
                         ChallengeBackend::deleteChallenge($id);
                          $this->addSuccessMessage("Challenge has been deleted succesfully");
                         }
         
          $limit = 3; 
	  $total_pages = ChallengeBackend::getNumberOfChallenges();
	  $targetpage = "http://localhost/hackademic/admin/pages/challengemanager.php";
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
	
         $challenges = ChallengeBackend::getNchallenges($start, $limit);
	 $this->addToView('challenges', $challenges);
	 $this->addToView('total_pages', $total_pages);
	 $this->addToView('pagination', $pagination);
	 $this->setViewTemplate('challengemanager.tpl');
	 $this->generateView();
     }
       private static function rrmdir($dir) {
           foreach(glob($dir . '/*') as $file) {
           if(is_dir($file))
            self::rrmdir($file);
         else
            unlink($file);
      }
      rmdir($dir);
     }
 }