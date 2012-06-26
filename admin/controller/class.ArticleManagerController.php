<?php
/**
 *
 * hackademic/admin/controller/class.ArticleManagerController.php
 *
 * Article Manager Controller
 *
 */
require_once(HACKADEMIC_PATH."admin/model/class.ArticleBackend.php");
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");

class ArticleManagerController extends HackademicBackendController {
    
    public function go() {
	if (isset($_GET['source']) && $_GET['source']=="del"){
        $this->addSuccessMessage("Article has been deleted succesfully");
       }
        $limit = 3; 
	$total_pages = ArticleBackend::getNumberOfArticles();
	$targetpage = "http://localhost/hackademic/admin/pages/articlemanager.php";
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
        
        $articles = ArticleBackend::getNarticles($start, $limit);
	$this->addToView('articles', $articles);
	$this->addToView('total_pages', $total_pages);
        $this->addToView('pagination', $pagination);
	$this->setViewTemplate('articlemanager.tpl');
	$this->generateView();
    }
}