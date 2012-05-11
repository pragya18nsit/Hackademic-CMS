<?php
/**
 *
 * Hackademic Backend Controller
 *
 * The parent class of all Hackademic Backend controllers.
 *
 */
require_once(HACKADEMIC_PATH."controller/class.HackademicController.php");

class HackademicBackendController extends HackademicController {
    
    /**
     * Function to set view template
     * @param $tmpl str Template name
     */
    public function setViewTemplate($tmp1) {
        $this->view_template=HACKADEMIC_PATH.'admin/view/'.$tmp1;
    }
}