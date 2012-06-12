{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/adduser.css"/>
  <div>{include file="_usermessage.tpl"}</div>
  <div id="stylized" class="myform">
<form id="form" name="form" method="post">
<h1>ADD A NEW USER</h1>


<label>Username:
<span class="small">Enter the name of user</span>
</label>
<input type="text" name="username" class="input_field"  />
<label>Firstname:
<span class="small">Enter the firstname</span>
</label>
<input type="text" name="first_name" class="input_field" />
<label>Lastname:
<span class="small">Enter the lastname</span>
</label>
<input type="text" name="last_name" class="input_field"  />

<label>Email
<span class="small">Enter a valid address</span>
</label>
<input type="text" name="email" id="email" class="input_field" />



<label>Password
<span class="small">Min. size 6 chars</span>
</label>
<input type="password" name="password" id="password" class="input_field" />
<label>Is administrator?
<span class="small">Do you want to make this user an administrator?</span></label>
      <div class="input_field">  	<input type="radio" name="is_admin" value="1"  /> yes
			<input type="radio" name="is_admin" value="0" /> no
			</div>

<button type="submit" name="submit" id="submit">Add user</button>
<div class="spacer"></div>

</form>
</div>
{include file="_footer.tpl"}