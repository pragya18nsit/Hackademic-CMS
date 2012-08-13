{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}assets/css/pagination.css"/>

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
			    <a href="{$site_root_path}admin/pages/addclass.php">
				<img class="action_image" src="{$site_root_path}admin/assets/images/addclass.png"/><br/>
				<span class="caption">Add Class</span>
			    </a>
			</div>
		    </td>
		    <td>
			<div class="submenu_btn">
			    <a href="{$site_root_path}admin/pages/manageclass.php">
				<img class="action_image" src="{$site_root_path}admin/assets/images/manageclass.png"/><br/>
				<span class="caption">Class Manager</span>
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
			<td>
			<select name="limit">
	             <option value="limit">Number of users per page</option>
                 <option value="5">5</option>
				 <option value="10">10</option>
				 <option value="15">15</option>
				 <option value="20">20</option>
				 <option value="25">25</option>
				 <option value="30">30</option>
				 <option value="40">40</option>
				 <option value="50">50</option>
				 <option value="75">75</option>
				 <option value="100">100</option>
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
	    <th>Classes</th>
	    <th>Joined</th>
	    <th>Last Visit</th>
	    <th>Activated</th>
	    <th>Type Of User</th>
	</thead>
	{foreach from=$users item=user}
	    <tr>
		<td><a href="{$site_root_path}admin/pages/edituser.php?id={$user->id}">{$user->username}</a></td>
		<td>{$user->full_name}</td>
		<td>{$user->email}</td>
		<td>
		    <a href="{$site_root_path}admin/pages/classmemberships.php?id={$user->id}">Edit</a>
		</td>
		<td>{$user->joined|date_format}</td>
		<td>{if $user->last_visit}{$user->last_visit|date_format}{else}Never{/if}</td>
		<td>{if $user->is_activated}Yes{else}No{/if}</td>
		<td>{if $user->type==1}Admin{elseif $user->type==2}Teacher{else}Student{/if}</td>
	   </tr>
	{/foreach}
    </table>
</div>
{include file="_footer.tpl"}