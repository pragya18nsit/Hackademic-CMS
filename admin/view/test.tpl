<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login to access the secret files!</title>
<link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/default.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>

<body>
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
   <!---- <?php if(isset($response)) echo "<h4 class='alert'>" . $response . "</h4>"; ?>--->
</div><!--end login-->
</body>
</html>
