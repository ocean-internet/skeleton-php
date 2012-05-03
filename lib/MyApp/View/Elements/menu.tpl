{if isset($menu)}
	<ol>
		<li><a href="/" title="Home Page">Home</a></li>
	{foreach $menu as $item}
		<li><a href="/Pages/view/{$item.id|escape}" title="{$item.title|escape}">{if ($item.short_title)}{$item.short_title|escape}{else}{$item.title|escape}{/if}</a>
	{/foreach}
	</ol>
{else}
	<p class="error">Menu not found!</p>
{/if}