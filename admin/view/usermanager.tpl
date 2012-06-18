{include file="_header.tpl"}
<div id="usermessage">{include file="_usermessage.tpl"}</div>
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/pagination.css"/>
<div>{$total_pages} Results</div>
{$pagination}
<table border="2">
	 <tr> <td> Username </td>
	      <td> Fullname </td>
		  <td> Email id </td>
		  <td> Joined </td>
		  <td> Last_visit</td>
		  <td> Is_activated</td>
		  <td> Is_admin</td>
	</tr>
		  {foreach from=$users item=user}
		   <tr>
		     <td><a href="{$site_root_path}admin/pages/edituser.php?id={$user->id}">{$user->username}</a></td>
			 <td>{$user->full_name}</td>
			 <td>{$user->email}</td>
			 <td>{$user->joined}</td>
		     <td>{$user->last_visit}</td>
			 <td>{$user->is_activated}</td>
		     <td>{$user->is_admin}</td>
		  </tr>
		  {/foreach}
       </table>	
	   To add a new user :
	   <a href="{$site_root_path}admin/pages/adduser.php">
	   Add user</a>
 	   
{include file="_footer.tpl"}