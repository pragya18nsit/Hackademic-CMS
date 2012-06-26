{include file="_header.tpl"}
<link rel="stylesheet" type="text/css" href="{$site_root_path}assets/css/login.css" />
<div id="usermessage">{include file="_usermessage.tpl"}</div>
<div id="login">
    <form method="post" action="{$site_root_path}pages/login.php">
    	<h1>Log In</h1>
	<fieldset id="inputs">
	    <input name="username" id="username" type="text" placeholder="Username" autofocus required>   
	    <input name="pwd" id="password" type="password" placeholder="Password" required>
	</fieldset>
	<fieldset id="actions">
            <input name="submit" type="submit" id="submit" value="Login">
        </fieldset>
    </form>
</div>