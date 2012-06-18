{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/adduser.css"/>
<div>{include file="_usermessage.tpl"}</div>
<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="{$site_root_path}admin/pages/edituser.php?id={$user->id}">
<h1>EDIT USER</h1>
<label>Username:
<span class="small">Enter the name of user</span>
</label>
<input type="text" name="username" class="input_field" value="{$user->username}" />
<label>Fullname:
<span class="small">Enter the fullname</span>
</label>
<input type="text" name="full_name" class="input_field" value="{$user->full_name}"/>
<label>Email
<span class="small">Enter a valid address</span>
</label>
<input type="text" name="email" id="email" class="input_field" value="{$user->email}" />
<label>Password
<span class="small">Min. size 6 chars</span>
</label>
<input type="password" name="password" id="password" class="input_field" />

<label>Is activated?
<span class="small">Do you want to activate this user or not?</span></label>
<div class="input_field">
    {if $user->is_activated}
    <input type="radio" name="is_activated" value="1" checked="true" /> yes
    <input type="radio" name="is_activated" value="0" /> no
    {else}
    <input type="radio" name="is_activated" value="1"  /> yes
    <input type="radio" name="is_activated" value="0" checked="true" /> no
    {/if}
    
</div>

<label>Is administrator?
<span class="small">Do you want to make this user an administrator?</span></label>
<div class="input_field">
    {if $user->is_admin}
    <input type="radio" name="is_admin" value="1" checked="true" /> yes
    <input type="radio" name="is_admin" value="0" /> no
    {else}
    <input type="radio" name="is_admin" value="1"  /> yes
    <input type="radio" name="is_admin" value="0" checked="true" /> no
    {/if}
    
</div>

<button type="submit" name="submit" id="submit">Edit user</button><hr/>
<button type="submit" name="deletesubmit" delete="submit">Submit to delete user</button>
<div class="spacer"></div>

</form>
</div>
{include file="_footer.tpl"}