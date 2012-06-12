<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <title>{if isset($controller_title)}{$controller_title} | {/if}{$app_title}</title>
  <link rel="shortcut icon" type="image/x-icon" href="{$site_root_path}admin/assets/images/favicon.png">
  <link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/style.css" />
  <link rel="stylesheet" type="text/css" href="{$site_root_path}admin/assets/css/base.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
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
			{if isset($main_menu)}
				<div id="username" class="right">Hi {$logged_in_user},<br/></div>
                <!-- Main Menu -->
                <div id="menuHeader"> 
                    <ul id="mainMenu">
                        {foreach from=$main_menu item=foo}                        
                        {if $foo['title']=='Login'}
                        <li>
                            {if isset($is_logged_in)}<div style="float:right">{include file="status.tpl"}</div>
                            {else} <a href="{$site_root_path}session/login.php">Login</a>{/if}
                        </li>
                        {else}<li><a href="{$site_root_path}{$foo['url']}">{$foo['title']}</a></li>{/if}
                        {/foreach}
                    </ul>
                </div>{/if}<br></div>
 