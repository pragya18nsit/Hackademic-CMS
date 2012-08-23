{include file="_header_frontend.tpl"}
<div class="main_content">
    <div class="header_bar">
	<div class="page_title"><h3 class="left">Progress Report</h3></div>
    </div><br/>
    {if isset($search_box)}
        <form type="GET">
            <label>Enter a name to search:</label>
            <input type="text" name="username" />
            <input type="submit" value="Search" />
        </form>
    {/if}
    {if (isset($data))}
    <table>
        <th>
            <td>Title</td>
            <td>No. Of Attempts</td>
            <td>Cleared</td>
            <td>Cleared On</td>
        </th>
    {foreach from=$data item=foo}
        <tr>
            <td><a href="{$site_root_path}pages/showchallenge.php?id={$foo['id']}">{$foo['title']}</a></td>
            <td>{if $foo['attempts'] == 0}Unattempted{else}{$foo['attempts']}{/if}</td>
            <td>{if $foo['attempts'] == 0}Not Applicable{elseif $foo['cleared'] == false}Uncleared{else}Cleared{/if}</td>
            <td>{if $foo['cleared'] == true}{$foo['cleared_on']}{else}Not Applicable{/if}</td>
        </tr>
    {/foreach}
    </table>
    {/if}
</div>
{include file="_footer_frontend.tpl"}