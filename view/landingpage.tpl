{include file="_header_frontend.tpl"}
<table id="mainTable" border="1">
    <tr>
        <td id="left_bar">Left Bar</td>
        <td id="main_content">Main Content</td>
        <td id="right_bar">
            {if isset($username)}
                Welcome {$username}
                <a href="{$site_root_path}pages/logout.php">Logout</a>
            {else}
                {include file="user_login.tpl"}
            {/if}
        </td>
    </tr>
</table>