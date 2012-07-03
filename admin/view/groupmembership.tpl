{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/pagination.css"/>
<div class="main_content">
    <div class="header_bar">
	<div class="page_title"><h3 class="left">Group Membership </h3></div>
    </div><br/>
    <div id="usermessage">{include file="_usermessage.tpl"}</div>
    
    <div id="input_form">
       <form method="post">
	    <table class="add_form">
	        <tr>
		    <td><label> Add user to group: </label></td>
		    <td>
			<select name="group_id">
			    {foreach from=$groups item=group}
				<option value="{$group->id}">{$group->name}</option>
			    {/foreach} 
			</select>
		    </td>
		    <td colspan="2">
			<p class="submit"><input type="submit" name="submit" id="submit" value="Add Group" /></p>
		    </td>
		</tr>
	    </table>
        </form>
    </div>
    <table class="manager_table">
	<thead> 
	    <th>Group name</th>
	    <th>Delete</th>
	</thead>
	{foreach from=$group_memberships item=group}
	    <tr>  
		<td>{$group['name']}</td>
		<td><a href="{$site_root_path}admin/pages/groupmemberships.php?id={$smarty.get.id}&group_id={$group['group_id']}&action=del">Delete</a></td>
	    </tr>
	{/foreach} 			
    </table>
{include file="_footer.tpl"}