{if !empty($social_links_list)}
	<ul id="itivos_social_list_link">
		{foreach from=$social_links_list item=item key=key}
			<li>
				<a href="{$item.link}" target="_blank"><span class="{$item.name}">{$item.icon}</span></a>
			</li>
		{/foreach}
	</ul>
{/if}