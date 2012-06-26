{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/pagination.css"/>

<div class="main_content">
<div class="header_bar">
    <div class="page_title"><h3 class="left">Challenge Manager</h3></div>
</div><br/>
<div id="usermessage">{include file="_usermessage.tpl"}</div>
<div id="paginate_div">{include file="_pagination.tpl"}</div>

<table class="manager_table">
	 <thead> 
	 <th>Challenge Title</th>
	 <th>Date posted</th>
	 <th>DELETE?</th>
		  
	</thead>
		  {foreach from=$challenges item=challenge}
		   <tr>
			 <td>{$challenge->title}</a></td>
                         <td>{$challenge->date_posted|date_format}</td>
			 
			
          <td>   
		  	<a href="{$site_root_path}admin/pages/challengemanager.php?id={$challenge->id}&action=del">Click to delete article!</a>
			</td>			
          </tr>
		  {/foreach}
       </table>
</div>
	  
 	   
{include file="_footer.tpl"}