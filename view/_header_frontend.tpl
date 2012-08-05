<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{if isset($controller_title)}{$controller_title} | {/if}{$app_title}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{$site_root_path}assets/images/favicon.png">
    <link rel="stylesheet" type="text/css" href="{$site_root_path}assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{$site_root_path}assets/css/pagination.css" />
    <link rel="stylesheet" type="text/css" href="{$site_root_path}assets/css/base.css" />
</head>
<body>
    <div id="main">
	<div id="headerBar">
	    <div class="left">
		<div class="pad_top_5 margin_left_25">
		    <a href="http://www.owasp.org" target="_blank">
		    <!-- style used inline because it will not be repeated elsewhere in the webapp -->
			<img id="orglogo" src="{$site_root_path}assets/images/owasp.png">
		    </a>
		</div>
	    </div>
	    <div class="center pad_25">
		<a href="{$site_root_path}">
		    <img id="logo" src="{$site_root_path}assets/images/logo.png">
		</a>
	    </div>     
	</div>	
	<div id="content">
	    <table id="mainTable">
		<tr>
		    <td id="left_bar" valign="top">
			{if isset($main_menu)}
			<!-- Main Menu -->
			<div id="menuHeader" class="menubg flt"> 
			    <ul id="mainMenu" class="menu flt">
				{foreach from=$main_menu item=foo}
				<li>
				<a class="width100" href="{$site_root_path}{$foo['url']}"><span class="padding_menu">{$foo['title']}</span></a></li>
				{/foreach}
			    </ul>
			</div>
			<br/>{/if}<br/>
			{if isset($challenge_menu)}
			<!-- Challenge Menu -->
			<div id="menuHeader" class="menubg flt"> 
			    <ul id="mainMenu" class="menu flt">
				{foreach from=$challenge_menu item=foo}
				<li>
				<a class="width100" href="{$site_root_path}pages/showchallenges.php?id={$foo['id']}"><span class="padding_menu">{$foo['title']}</span></a></li>
				{/foreach}
			    </ul>
			</div>
			<br/>{/if}<br/>
		    </td>
		    <td id="main_content" valign="top">
			<div id="usermessage">{include file="_usermessage.tpl"}</div>
