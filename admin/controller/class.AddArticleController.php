<?php
/**
 *
 * Controller1
 *
 * Create Hackademic Main Menu
 *
 */
 require_once(HACKADEMIC_PATH."model/common/class.Article.php");
 require_once(HACKADEMIC_PATH."model/common/class.HackademicDB.php");
 require_once(HACKADEMIC_PATH."/admin/controller/class.HackademicBackendController.php");
 class AddArticleController extends HackademicBackendController {
                       public function go() {
                       $this->setViewTemplate('editor.tpl');
                       if(isset($_POST['submit'])){
                       if ($_POST['title']=='') {
			    $this->addErrorMessage("Title of the article should not be empty"); 
                       }elseif ($_POST['content']=='') {
			    $this->addErrorMessage("Article post should not be empty");
		       }  else {
                            
                            $this->username = $_SESSION['hackademic_user'];
                            $this->title =$_POST['title'];
                            $this->content = $_POST['content'];
	                    $this->date_posted = date("Y-m-d");
                            
                            Article::addarticle($this->username,$this->title,$this->content,$this->date_posted);
                            $this->addSuccessMessage("Article has been added succesfully");
                       }
                            }
                            else{
                            $this->setViewTemplate('editor.tpl');
                            }
                            $this->generateView();
                            }
                       } 
               
 
    