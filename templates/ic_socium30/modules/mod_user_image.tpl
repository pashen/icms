{if $is_usr}
	{foreach key=tid item=usr from=$users}
	<div class="mod_bestphoto_item_box">
		<div class="mod_bestphoto_item">
			<a class="mod_bestphoto_image" href="/users/{$usr.uid}/photo{$usr.id}.html">
				<img style="display: block; margin:0px auto;" src="/images/users/photos/small/{$usr.imageurl}" border="0"/>
			</a>
			{if $cfg.showtitle}
				<div class="mod_bestphoto_desc">
					<div class="mod_bestphoto_title" style="text-decoration: none;">{$usr.title}</div>
					<div align="center">{$usr.genderlink}</a></div>
				</div>
			{/if}
		</div>
	</div>
	{/foreach}
{else}
	<p>Нет данных для отображения.</p>
{/if}