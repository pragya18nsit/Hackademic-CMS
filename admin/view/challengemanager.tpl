{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}assets/css/pagination.css"/>

<div class="main_content">
    <div class="header_bar">
	<div class="page_title"><h3 class="left">Challenge Manager</h3></div>
	<div id="" class="right action_button">
	    <table>
		<tr class="center">
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
			    <option value="title">Title</option>
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
	    <th>Challenge Title</th>
	    <th>Date posted</th>
	    <th>Visibility</th>
	    <th>Classes</th>
	    <th>Published</th>
	    <th>DELETE?</th>
	</thead>
	{foreach from=$challenges item=challenge}
	    <tr>
		<td>
		 <a href="{$site_root_path}admin/pages/editchallenge.php?id={$challenge->id}&action=update">
		 {$challenge->title}</a>
		</td>
		<td>{$challenge->date_posted|date_format}</td>
		<td>{if $challenge->visibility == "public"}Public{else}Private{/if}</td>
		<td>{if $challenge->visibility == "public"}N/A{else}<a href="{$site_root_path}admin/pages/classchallenges.php?id={$challenge->id}">Edit</a>{/if}</td>
		<td>{if $challenge->publish == 0}No{else}Yes{/if}</td>
		<td>   
		    <a href="{$site_root_path}admin/pages/challengemanager.php?id={$challenge->id}&action=del">Delete challenge?</a>
		</td>			
	    </tr>
	{/foreach}
    </table>
</div>
{include file="_footer.tpl"}