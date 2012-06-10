{include file="_header.tpl"}
  <body>
  <div>{include file="_usermessage.tpl"}</div>
<div id="login">
	<form method="post" action="">
    	<h2>Login <small>enter your credentials</small></h2>
        <p>
        	<label for="name">Username: </label>
            <input type="text" name="username" />
        </p>
        
        <p>
        	<label for="pwd">Password: </label>
            <input type="password" name="pwd" />
        </p>
        
        <p>
        	<input type="submit" id="submit" value="Login" name="submit" />
        </p>
    </form>
</div><!--end login-->
{include file="_footer.tpl"}
