<?php
/**
 *
 * UserManagerController
 *
 * Create Hackademic Main Menu
 *
 */
require_once(HACKADEMIC_PATH."model/common/class.HackademicDB.php");
 require_once(HACKADEMIC_PATH."/model/common/class.User.php");
 require_once(HACKADEMIC_PATH."/controller/class.HackademicController.php");
 class UserManagerController extends HackademicController {
    
    public function go() {
       echo '<table border="1" spacing="1">';
       echo "<tr> <td> username </td>" ;
       echo "<td> first name </td>";
       echo    "<td> last name </td>";
       echo    "<td> email id </td> </tr>";
       echo "<br/>";
       self::getuserdetails();
    }
    public static function getuserdetails(){
        global $db;
	$sql = "SELECT * FROM users";
	$query = $db->query($sql);
          while($result=$db->fetchArray($query)){
	   if ($result) {
           $name=$result['username'];
           echo "<tr><td>".'<a href="http://localhost/hackademic/admin/pages/AddUser.php">'.$name.'</a></td>';
           echo "<td>".$result['first_name']."</td>";
           echo "<td>".$result['last_name']."</td>";
           echo "<td>".$result['email']."</td>";
           echo "<br/>";
	  }
          else {
	    return false;
            }
        }
        echo '</table>';
    }
    
 }
    
    