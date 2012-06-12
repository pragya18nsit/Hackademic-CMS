{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/pagination.css"/>
<div>{$total_pages} Results</div>
{$pagination}
<table border="2">
	 <tr> <td> username </td>
	      <td> firstname </td>
		  <td> lastname </td>
		  <td> emailid <td>
	</tr>
		  {foreach from=$users item=user}
		   <tr>
		     <td><a href="{$site_root_path}admin/pages/AddUser.php">{$user->username}</a></td>
			 <td>{$user->first_name}</td>
			 <td>{$user->last_name}</td>
			 <td>{$user->email}</td>
          </tr>
		  {/foreach}
       </table>	
	   To add a new user :<button type="submit" name="submit" id="submit">
	   <a href="{$site_root_path}admin/pages/AddUser.php">
	   Add user</a></button>
 	   
{include file="_footer.tpl"}