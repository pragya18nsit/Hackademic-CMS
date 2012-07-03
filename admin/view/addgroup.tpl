{include file="_header.tpl"}

<div class="main_content">
    <div class="header_bar">
	<div class="page_title"><h3 class="left">Add Group</h3></div>
    </div><br/>
    <div id="usermessage">{include file="_usermessage.tpl"}</div>
    
    <div id="input_form">
	<form id="form" name="form" method="post">
	    <table class="add_form">
		<tr>
		    <td><label for="name">Group Name</label></td>
		    <td><input type="text" name="groupname"/></td>
		</tr>
		<tr class="submit_btn">
		    <td colspan="2">
			<p class="submit"><input type="submit" name="submit" id="submit" value="Add Group" /></p>
		    </td>
		</tr>
	    </table>
	</form>
    </div>
</div>
{include file="_footer.tpl"}