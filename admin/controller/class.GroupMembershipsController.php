<?php
/**
 *
 * Hackademic-CMS/admin/controller/class.GroupMembershipsController.php
 *
 * Hackademic Group Memberships Controller
 * Class for the Group Memberships page in Backend
 *
 * Copyright (c) 2012 OWASP
 *
 * LICENSE:
 *
 * This file is part of Hackademic CMS (https://www.owasp.org/index.php/OWASP_Hackademic_Challenges_Project).
 *
 * Hackademic CMS is free software: you can redistribute it and/or modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any
 * later version.
 *
 * Hackademic CMS is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with Hackademic CMS.  If not, see
 * <http://www.gnu.org/licenses/>.
 *
 *
 * @author Pragya Gupta <pragya18nsit[at]gmail[dot]com>
 * @author Konstantinos Papapanagiotou <conpap[at]gmail[dot]com>
 * @license http://www.gnu.org/licenses/gpl.html
 * @copyright 2012 OWASP
 *
 */
require_once(HACKADEMIC_PATH."admin/model/class.GroupMemberships.php");
require_once(HACKADEMIC_PATH."admin/model/class.Groups.php");
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");

class GroupMembershipsController extends HackademicBackendController {
    
    public function go() {
        $this->setViewTemplate('groupmembership.tpl');
	$user_id=$_GET['id'];
	if (isset($_POST['submit'])) {
	    $group_id=$_POST['group_id'];
	    if(GroupMemberships::doesMembershipExist($user_id, $group_id))
	    {
		$this->addErrorMessage("User is already a member of this group");
	    }
	    else{
	    GroupMemberships::addMembership($user_id,$group_id);
	    $this->addSuccessMessage("User has been added to the group succesfully");
	    }
	}
	elseif (isset($_GET['action']) && $_GET['action']=="del") {
	    $group_id=$_GET['group_id'];
	    GroupMemberships::deleteMembership($user_id,$group_id);
	    $this->addSuccessMessage("User has been deleted from the group succesfully");
	}	
	$group_memberships = GroupMemberships::getMembershipsOfUser($user_id);
        
        $groups = Groups::getAllGroups();
	$this->addToView('groups', $groups);
	$this->addToView('group_memberships', $group_memberships);
	$this->setViewTemplate('groupmembership.tpl');
	$this->generateView();
    }
}