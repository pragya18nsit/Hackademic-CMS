{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/pagination.css"/>

<div class="main_content">
    <div class="header_bar">
	<div class="page_title"><h3 class="left">User Manager</h3></div>
	<div id="" class="right action_button">
	    
	    <table>
		<tr class="center">
		    <td>
			<div class="submenu_btn">
			    <a href="{$site_root_path}admin/pages/adduser.php">
				<img class="action_image" src="{$site_root_path}admin/assets/images/adduser.png"/><br/>
				<span class="caption">New</span>
			    </a>
			</div>
		    </td>
		    <td>
			<div class="submenu_btn">
			    <a href="{$site_root_path}admin/pages/addgroup.php">
				<img class="action_image" src="{$site_root_path}admin/assets/images/addgroup.png"/><br/>
				<span class="caption">Add Group</span>
			    </a>
			</div>
		    </td>
		    <td>
			<div class="submenu_btn">
			    <a href="{$site_root_path}admin/pages/managegroup.php">
				<img class="action_image" src="{$site_root_path}admin/assets/images/managegroup.png"/><br/>
				<span class="caption">Group Manager</span>
			    </a>
			</div>
		    </td>
		</tr>
	    </table>
	</div>
    </div><br/>
    
    <div id="input_form">
	<form method ="get">
	    <table class="add_form">
		<tr>
		    <td><input type="text" name="search" id="search"/></td>
		    <td>
			<select name="category">
			    <option value="username">Username</option> 
			    <option value="fullname">Full Name</option> 
			    <option value="email">Email</option> 
			</select>
		    </td>
		    <td class="submit_btn">
			<p class="submit"><input type="submit" name="submit" id="submit" value="search" /></p>
		    </td>
		</tr>
	    </table>
	</form>
    </div>
    
    <div id="usermessage">{include file="_usermessage.tpl"}</div>
    <div id="paginate_div">{include file="_pagination.tpl"}</div>
    
    <table class="manager_table">
	<thead>
	    <th> Username </th>
	    <th>Full Name</th>
	    <th>Email</th>
	    <th>Groups</th>
	    <th>Joined</th>
	    <th>Last Visit</th>
	    <th>Activated</th>
	    <th>Administrator</th>
	</thead>
	{foreach from=$users item=user}
	    <tr>
		<td><a href="{$site_root_path}admin/pages/edituser.php?id={$user->id}">{$user->username}</a></td>
		<td>{$user->full_name}</td>
		<td>{$user->email}</td>
		<td>
		    <a href="{$site_root_path}admin/pages/groupmemberships.php?id={$user->id}">Edit</a>
		</td>
		<td>{$user->joined|date_format}</td>
		<td>{if $user->last_visit}{$user->last_visit|date_format}{else}Never{/if}</td>
		<td>{if $user->is_activated}Yes{else}No{/if}</td>
		<td>{if $user->is_admin}Yes{else}No{/if}</td>
	   </tr>
	{/foreach}
    </table>
</div>
{include file="_footer.tpl"}