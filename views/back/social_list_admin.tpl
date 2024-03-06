<div class='main_app_trans'>
	<ul id="itivos_socialslink_list_admin">
		{foreach from=$social_list item=social key=key }
			<li><span id_link="{$social.id}">{$social.name}</span></li>
		{/foreach}
	</ul>
</div>