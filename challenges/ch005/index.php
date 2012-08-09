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
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
<title>Challenge 005</title>
<style type="text/css">
.style2 {
	font-size: xx-large;
	color: #0000FF;
}
.style3 {
	color: #808000;
}
</style>
<center>
<body bgcolor="black">
<img src="p0wnb.png">
<font color="green">

</head>


<?php

if ( ($_SERVER['HTTP_USER_AGENT'] === 'p0wnBrowser') )
{
			echo "<H1>Congratulations!</H1>";
}
else
{
	echo "<h2><br><br>Unfortunately, you cannot access the contents of this site...<br>
In order to do this, you must buy p0wnBrowser. It only costs 3500 euros.";
}
?>

</html>
