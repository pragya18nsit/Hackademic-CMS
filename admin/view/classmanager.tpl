{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}assets/css/pagination.css"/>

<div class="main_content">
    <div class="header_bar">
	<div class="page_title"><h3 class="left">Class Manager</h3></div>
    </div><br/>
    <div id="input_form">
	<form method ="get">
	    <table class="add_form">
		<tr>
		    <td><input type="text" name="search" id="search" value="{if isset($search_string)}{$search_string}{/if}"/></td>
		    <td>
			<select name="category">
			    <option value="name">Class Name</option> 
			</select>
		    </td>
		    <td class="submit_btn">
			<p class="submit"><input type="submit" name="submit" id="submit" value="Search" /></p>
		    </td>
		</tr>
	    </table>
	</form>
    </div>
    
    <div id="usermessage">{include file="_usermessage.tpl"}</div>
    <div id="paginate_div">{include file="_pagination.tpl"}</div>
    
    <table class="manager_table">
	<thead> 
	    <th>Class name</th>
	    <th>Date created</th>
	    <th>Archive?</th>
	    <th>Delete?</th>
	</thead>
	{foreach from=$classes item=class}
	    <tr>
		<td><a href="{$site_root_path}admin/pages/showclass.php?id={$class->id}">{$class->name}</a></td>
		<td>{$class->date_created|date_format}</td>
		<td>   
		    <a href="{$site_root_path}admin/pages/manageclass.php?id={$class->id}&source=arch">Click to archive class!</a>
		</td>
		<td>   
		    <a href="{$site_root_path}admin/pages/manageclass.php?id={$class->id}&source=del">Click to delete class!</a>
		</td>		
	    </tr>
	{/foreach}
    </table>
</div>
{include file="_footer.tpl"}