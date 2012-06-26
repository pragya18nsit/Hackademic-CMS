<!-- <div>{$total_pages} Results</div> -->
{if $pagination['lastpage'] > 1}	
    <div class='paginate'>
    <!-- Previous -->
    {if $pagination['page'] > 1}
	<a href="{$pagination['targetpage']}?page={$pagination['prev']}">Previous</a>
    {else}
	<span class='disabled'>Previous</span>
    {/if}
    <!-- Pages -->
    {if $pagination['lastpage'] < 7 + ($pagination['stages']*2)}
        <!-- Not enough pages to breaking it up -->
        {for $counter=1 to $pagination['lastpage']}
	    {if $counter == $pagination['page']}
                <span class='current'>{$counter}</span>
	    {else}
		<a href="{$pagination['targetpage']}?page={$counter}">{$counter}</a>
	    {/if}
	{/for}
    {elseif $pagination['lastpage'] > 5 + ($pagination['stages'] * 2)}
        <!--  Enough pages to hide a few -->
	<!-- Beginning only hide later pages -->
	{if $pagination['page'] < 1 + ($pagination['stages'] * 2)}
	    {for $counter=1 to (3+($pagination['stages'] * 2))}
		{if $counter == $pagination['page']}
                    <span class='current'>{$counter}</span>
                {else}
		    <a href="{$pagination['targetpage']}?page={$counter}">{$counter}</a>
		{/if}
	    {/for}
            ...
            <a href="{$pagination['targetpage']}?page={$pagination['last_page_m1']}">{$pagination['last_page_m1']}</a>
            <a href="{$pagination['targetpage']}?page={$pagination['lastpage']}">{$pagination['lastpage']}</a>
	{elseif ((($pagination['lastpage'] - ($pagination['stages'] * 2)) > $pagination['page']) && ($pagination['page'] > ($pagination['stages'] * 2)))}
            <!-- Middle hide some front and some back -->
	    <a href="{$pagination['targetpage']}?page=1">1</a>
	    <a href="{$pagination['targetpage']}?page=2">2</a>
	    ...
	    {for $counter=($pagination['page'] - $pagination['stages']) to ($pagination['page'] + $pagination['stages'])}
		{if $counter == $pagination['page']}
		    <span class='current'>{$counter}</span>
		{else}
                    <a href="{$pagination['targetpage']}?page={$counter}">{$counter}</a>
		{/if}
	    {/for}
	    ...
	    <a href="{$pagination['targetpage']}?page={$pagination['last_page_m1']}">{$pagination['last_page_m1']}</a>
	    <a href="{$pagination['targetpage']}?page={$pagination['lastpage']}">{$pagination['lastpage']}</a>
	{else}
	    <!-- End only hide early pages -->
	    <a href="{$pagination['targetpage']}?page=1">1</a>
	    <a href="{$pagination['targetpage']}?page=2">2</a>
	    ...
	    {for $counter=($pagination['lastpage'] - (2 + ($pagination['stages'] * 2))) to $pagination['lastpage']}
		{if $counter == $pagination['page']}
		    <span class='current'>{$counter}</span>
	        {else}
		    <a href="{$pagination['targetpage']}?page={$counter}">{$counter}</a>
		{/if}
	    {/for}
	{/if}
    {/if}
    <!--  Next -->
    {if $pagination['page'] < ($counter - 1)}
	<a href="{$pagination['targetpage']}?page={$pagination['next']}">Next</a>
    {else}
	<span class='disabled'>Next</span>
    {/if}
    </div>
{/if}