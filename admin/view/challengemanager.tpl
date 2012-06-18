{include file="_header.tpl"}
<div>{include file="_usermessage.tpl"}</div>
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/pagination.css"/>
<div>{$total_pages} Results</div>
{$pagination}
<table border="2">
	 <tr> 
	      <td> Title of the challenge </td>
		  <td> Date-posted </td>
		  <td>  DELETE?</td>
		  
	</tr>
		  {foreach from=$challenges item=challenge}
		   <tr>
			 <td>{$challenge->title}</a></td>
                         <td>{$challenge->date_posted}</td>
			 
			
          <td>   
		  	<a href="{$site_root_path}admin/pages/challengemanager.php?id={$challenge->id}&action=del">Click to delete article!</a>
			</td>			
          </tr>
		  {/foreach}
       </table>	
	  
 	   
{include file="_footer.tpl"}