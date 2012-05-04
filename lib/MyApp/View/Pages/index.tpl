{if isset($Pages)}
	<ol>
	{foreach $Pages as $Page}
		<li>
			<h2><a href="/Pages/view/{$Page.id}" title="{$Page.title}">{if ($Page.short_title)}{$Page.short_title}{else}{$Page.title}{/if}</a></h2>
			{if ($Page.intro)}<p>{$Page.intro}</p>{/if}
		</li>
	{/foreach}
	</ol>
{else}
	<p>No Pages Found</p>
{/if}

