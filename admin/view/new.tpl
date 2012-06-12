<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{if $controller_title}{$controller_title} | {/if}{$app_title}</title>
  <link rel="shortcut icon" type="image/x-icon" href="{$site_root_path}assets/img/favicon.png">
  <link type="text/css" rel="stylesheet" href="{$site_root_path}assets/css/adduser.css">
  <div id="stylized" class="myform">
<form id="form" name="form" method="post">
<h1>ADD A NEW USER</h1>


<label>Name:
<span class="small">Add the name of user</span>
</label>
<input type="text" name="username" id="name" />
<label>Firstname:
<span class="small">Add the firstname</span>
</label>
<input type="text" name="first_name" id="name" />
<label>Lastname:
<span class="small">Add the lastname</span>
</label>
<input type="text" name="last_name" id="name" />

<label>Email
<span class="small">Add a valid address</span>
</label>
<input type="text" name="email" id="email" />



<label>Password
<span class="small">Min. size 6 chars</span>
</label>
<input type="text" name="password" id="password" />
<label>Is administrator?
<span class="small">Do you want to make this user administrator?</span>
        	<input type="radio" name="is_admin">Yes<br />
            <input type="radio" name="is_admin">No

<button type="submit">Add user</button>
<div class="spacer"></div>

</form>
</div>