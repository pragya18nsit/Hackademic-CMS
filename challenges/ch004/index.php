<?php

/** 
 *    ----------------------------------------------------------------
 *    OWASP Hackademic Challenges Project
 *    ----------------------------------------------------------------
 *    Copyright (C) 2010-2011 
 *   	  Andreas Venieris [venieris@owasp.gr]
 *   	  Anastasios Stasinopoulos [anast@owasp.gr]
 *    ----------------------------------------------------------------
 */
 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>
<head>
<title>Challenge 004</title>
<center>
<body bgcolor="black">
<img src="xssme2.png">
<font color="green">
</head>
<body>
<h2>
<hr>
<?php
	
	// <script>alert(String.fromCharCode(88,88,83,33))</script>
	$try_xss = $_POST['try_xss'];
	if($try_xss == '<script>alert(String.fromCharCode(88,83,83,33))</script>') {
    		echo 'Thank you '.$try_xss.'';
			echo "<H1>Congratulations!</H1>";
    		
    } 
	else {
?>
	Try to XSS me...Again! <br />
	<form method="POST">
	<input type="text" name="try_xss" />
	<input type="submit" value="XSS Me!" />
	</form>
<?php 
	}
?>
<hr>
</h2>
</body>
</html>

