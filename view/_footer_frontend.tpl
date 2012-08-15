            </td>
                    <td id="right_bar" valign="top">
                        {if isset($is_logged_in)}
                            Welcome {$logged_in_user}
                            <a href="{$site_root_path}pages/logout.php">Logout</a>
                        {else}
                            {include file="user_login.tpl"}
                        {/if}
						<br/><br/>
						{if isset($user_menu)}
					   	<div id="menuHeader" class="menubg flt"> 
			                 <ul id="mainMenu" class="menu flt">
				           {foreach from=$user_menu item=foo}
				           <li>
				           <a class="width100" href="{$site_root_path}{$foo['url']}"><span class="padding_menu">{$foo['title']}</span></a></li>
				           {/foreach}
			                 </ul>
		            	</div>
		            	{/if}
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>