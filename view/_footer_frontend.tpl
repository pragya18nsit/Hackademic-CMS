            </td>
                    <td id="right_bar" valign="top">
                        {if isset($username)}
                            Welcome {$username}
                            <a href="{$site_root_path}pages/logout.php">Logout</a>
                        {else}
                            {include file="user_login.tpl"}
                        {/if}
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>