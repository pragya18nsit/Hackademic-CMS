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
</table>
<p class="submit"><input type="submit" name="submit" value="Update Challenge Details" /></p>

</form>		
</div>
	   
{include file="_footer.tpl"}