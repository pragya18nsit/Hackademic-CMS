<?php
/**
 *
 * hackademic/admin/controller/class.AddArticleController.php
 *
 * Add Article Controller
 *
 */
require_once(HACKADEMIC_PATH."model/common/class.Session.php");
require_once(HACKADEMIC_PATH."admin/model/class.ArticleBackend.php");
require_once(HACKADEMIC_PATH."/admin/controller/class.HackademicBackendController.php");

class AddArticleController extends HackademicBackendController {
   
    public function go() {
        $this->setViewTemplate('editor.tpl');
        if(isset($_POST['submit'])) {
            if ($_POST['title']=='') {
	        $this->addErrorMessage("Title of the article should not be empty");
            } elseif (!isset($_POST['is_published'])) {
	        $this->addErrorMessage("Please tell if the article has been published successfully?");
	    } elseif ($_POST['content']=='') {
	        $this->addErrorMessage("Article post should not be empty");
	    } else {
                $this->created_by= Session::getLoggedInUser();
                $this->title =$_POST['title'];
                $this->is_published=$_POST['is_published'];
                $this->content = $_POST['content'];
                $this->date_posted = date("Y-m-d");
                
                ArticleBackend::addArticle($this->title,$this->content,$this->date_posted,$this->created_by,$this->is_published);
                $this->addSuccessMessage("Article has been added succesfully");
                $id = ArticleBackend::insertId();
                header('Location: '.SOURCE_ROOT_PATH."admin/pages/editarticle.php?id=$id & source=new");
                
                 }
        }        
        $this->generateView();
    }
} 