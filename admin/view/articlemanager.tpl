{include file="_header.tpl"}
<div>{include file="_usermessage.tpl"}</div>
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/pagination.css"/>
<div>{$total_pages} Results</div>
{$pagination}
<table border="2">
	 <tr> 
	       <td> title </td>
		   <td> date-posted </td>
		   <td>created_by</td>
           <td>last_modified</td>
	       <td>last_modified_by</td>
		   <td>ordering</td>
	       <td>is_published</td>
	</tr>
		  {foreach from=$articles item=article}
		   <tr>
			 <td><a href="{$site_root_path}admin/pages/editarticle.php?id={$article->id}">{$article->title}</a></td>
                         <td>{$article->date_posted}</td>
						 <td>{$article->created_by}</td>
						 <td>{$article->last_modified}</td>
						 <td>{$article->last_modified_by}</td>
						 <td>{$article->ordering}</td>
						 <td>{$article->is_published}</td>
          </tr>
		  {/foreach}
       </table>	
	  
 	   
{include file="_footer.tpl"}