{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/pagination.css"/>

<div class="main_content">
    <div class="header_bar">
	<div class="page_title"><h3 class="left">Article Manager</h3></div>
    </div><br/>
    
    <div id="input_form">
	<form method ="get">
	    <table class="add_form">
		<tr>
		    <td><input type="text" name="search" id="search"/></td>
		    <td>
			<select name="category">
			    <option value="title">Title</option> 
			    <option value="created_by">Author</option> 
			    <option value="last_modified_by">Last modified by</option> 
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
	    <th>Title</th>
	    <th>Date posted</th>
	    <th>Author</th>
	    <th>Last Modified</th>
	    <th>Last modified by</th>
	    <th>Order</th>
	    <th>Published</th>
	</thead>
	{foreach from=$articles item=article}
	    <tr>
		<td><a href="{$site_root_path}admin/pages/editarticle.php?id={$article->id}">{$article->title}</a></td>
		<td>{$article->date_posted|date_format}</td>
		<td>{$article->created_by}</td>
		<td>{if $article->last_modified}{$article->last_modified|date_format}{else}-{/if}</td>
		<td>{if $article->last_modified}{$article->last_modified_by}{else}-{/if}</td>
		<td>{$article->ordering}</td>
		<td>{if $article->is_published}Yes{else}No{/if}</td>
	    </tr>
	{/foreach}
    </table>
	 
</div>
{include file="_footer.tpl"}