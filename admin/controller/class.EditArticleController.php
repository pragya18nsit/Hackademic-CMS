<?php
/**
 *
 * Controller2
 *
 * Create Hackademic Main Menu
 *
 */
 require_once(HACKADEMIC_PATH."model/common/class.HackademicDB.php");
 require_once(HACKADEMIC_PATH."admin/model/class.ArticleBackend.php");
 require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");
 class EditArticleController extends HackademicBackendController {
    
    public function go() {
      if (isset($_GET['id']))
     {
        $id=$_GET['id'];
     }
     if (isset($_GET['source']) && $_GET['source']=="new"){
      $this->addSuccessMessage("Article has been added succesfully");
     }

                       if(isset($_POST['submit'])){
                       if ($_POST['title']=='') {
			    $this->addErrorMessage("Title of the article should not be empty"); 
                       }elseif (!isset($_POST['is_published'])) {
	                    $this->addErrorMessage("Please tell if the article has been published successfully?");
	               }elseif ($_POST['content']=='') {
			    $this->addErrorMessage("Article post should not be empty");
	               }else {
                            $this->title =$_POST['title'];
			    $this->is_published=$_POST['is_published'];
                            $this->content = $_POST['content'];
	                    $this->last_modified=date("Y-m-d H-i-s");
			    $this->last_modified_by=Session::getLoggedInUser();
			    
			    
                            
                            ArticleBackend::updateArticle($id,$this->title,$this->content,$this->last_modified,$this->last_modified_by);
                            $this->addSuccessMessage("Article has been updated succesfully");
			   }
                      }
		      
			    $article=ArticleBackend::getArticle($id);
			    $this->setViewTemplate('editarticle.tpl');
			    $this->addToView('article', $article[0]);
                            $this->generateView();
		      if(isset($_POST['deletesubmit'])){
                            ArticleBackend::deleteArticle($id);
			    header('Location:'.SOURCE_ROOT_PATH."admin/pages/articlemanager.php?source=del");
	                    }  
        
                    }
               }