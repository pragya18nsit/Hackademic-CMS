<?php
/**
 *
 * Hackademic-CMS/controller/class.ReadArticleController.php
 *
 * Hackademic Frontend Read Article Controller
 * Class for creating the frontend Main Menu
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
require_once(HACKADEMIC_PATH."/admin/model/class.ClassMemberships.php");
require_once(HACKADEMIC_PATH."/admin/model/class.ClassChallenges.php");
require_once(HACKADEMIC_PATH."/model/common/class.Session.php");
require_once(HACKADEMIC_PATH."/model/common/class.User.php");
require_once(HACKADEMIC_PATH."/controller/class.HackademicController.php");
class ProgressReportController extends HackademicController{
	public function go() {
		$username = Session::getLoggedInUser();
                $user = User::findByUserName($username);
                $classes_of_user = ClassMemberships::getMembershipsOfUser($user->id);
                $challenges_of_user = ClassChallenges::getChallengesOfClasses($classes_of_user);
                print_r($challenges_of_user);
	}
}
