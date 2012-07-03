{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/pagination.css"/>

<div class="main_content">
    <div class="header_bar">
	<div class="page_title"><h3 class="left">User Manager</h3></div>
	<div id="adduser" class="right action_button">
	    <a href="{$site_root_path}admin/pages/adduser.php">
	    <table>
		<caption align="bottom" class="caption">New</caption>
		<tr>
		    <td><img class="action_image" src="{$site_root_path}admin/assets/images/adduser.png"/></td>
		</tr>
	    </table>
	    </a>
	</div>
    </div><br/>
    <div id="usermessage">{include file="_usermessage.tpl"}</div>
    <div id="paginate_div">{include file="_pagination.tpl"}</div>
    
    <table class="manager_table">
	<thead>
	    <th> Username </th>
	    <th>Full Name</th>
	    <th>Email</th>
	    <th>Joined </th>
	    <th>Last Visit</th>
	    <th>Activated</th>
	    <th>Administrator</th>
	</thead>
	{foreach from=$users item=user}
	    <tr>
	      <td><a href="{$site_root_path}admin/pages/edituser.php?id={$user->id}">{$user->username}</a></td>
		  <td>{$user->full_name}</td>
		  <td>{$user->email}</td>
		  <td>{$user->joined|date_format}</td>
	      <td>{if $user->last_visit}{$user->last_visit|date_format}{else}Never{/if}</td>
		  <td>
		     {if $user->is_activated}Yes{else}No{/if}
		  </td>
	      <td>
		 {if $user->is_admin}Yes{else}No{/if}
	      </td>
	   </tr>
	{/foreach}
    </table>
</div>
{include file="_footer.tpl"}