{include file="_header.tpl"}
<div class="main_content">
    <div class="header_bar">
        <div class="page_title"><h3 class="left">Edit Challenge</h3></div>
    </div><br/>
	 <div id="usermessage">{include file="_usermessage.tpl"}</div>
	  <div id="input_form">
    <form id="form" name="form" method="post">
	<table class="user_add">
	    <tr>
		<td><label for="name">TITLE</label></td>
		<td><input type="text" name="title" value="{$challenge->title}"/></td>
	    </tr>
		
		
		<tr>
		<td><label for="name">DESCRIPTION</label></td>
		<td><textarea name="description" >{$challenge->description}</textarea></td>
	    </tr>
		
		<tr>
		<td><label for="visibility">VISIBILITY</label></td>
		<td><select name="visibility">
			    {if $challenge->visibility=="public"}
               <option value="public" selected="selected">Public</option>
			   <option value="private" >Private</option>
			   {else $challenge->visibility=="private"}
               <option value="private" selected="selected">Private</option>
			   <option value="public" >Public</option>
			   {/if}
			   </select></td>
		</tr>
		<tr>
		<td><label for="publish">PUBLISH</label></td>
		<td><select name="publish">
			    {if $challenge->publish==0}
               <option value="0" selected="selected">Not published</option>
			   <option value="1" >Publish</option>
			   {else}
               <option value="1" selected="selected">Publish</option>
			   <option value="0" >Public</option>
			   {/if}
			   </select></td>
		</tr>
	    
</table>
<p class="submit"><input type="submit" name="submit" value="Update Challenge Details" /></p>

</form>		
</div>
	   
{include file="_footer.tpl"}