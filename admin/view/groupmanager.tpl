{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}assets/css/pagination.css"/>

<div class="main_content">
    <div class="header_bar">
	<div class="page_title"><h3 class="left">Group Manager</h3></div>
    </div><br/>
    <div id="input_form">
	<form method ="get">
	    <table class="add_form">
		<tr>
		    <td><input type="text" name="search" id="search"/></td>
		    <td>
			<select name="category">
			    <option value="name">Group Name</option> 
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
	    <th>Group name</th>
	    <th>Date created</th>
	    <th>Archive?</th>
	    <th>Delete?</th>
	</thead>
	{foreach from=$groups item=group}
	    <tr>
		<td>{$group->name}</a></td>
		<td>{$group->date_created|date_format}</td>
		<td>   
		    <a href="{$site_root_path}admin/pages/managegroup.php?id={$group->id}&source=arch">Click to archive group!</a>
		</td>
		<td>   
		    <a href="{$site_root_path}admin/pages/managegroup.php?id={$group->id}&source=del">Click to delete group!</a>
		</td>		
	    </tr>
	{/foreach}
    </table>
</div>
{include file="_footer.tpl"}