{if $is_img}
	<div class="mod_bestphoto_item_box">
		<div class="mod_bestphoto_item">
			<a class="mod_bestphoto_image" href="/photos/photo{$item.id}.html">
				<img style="display: block; margin:0px auto;" src="/images/photos/small/{$item.file}" border="0" />
			</a>
			{ if $cfg.showtitle}
				<div class="mod_bestphoto_desc">
					<a class="mod_bestphoto_title" style="text-decoration: none;" href="/photos/photo{$item.id}.html">{$item.title}</a>
				</div>
			{/if}
		</div>
	</div>
{/if}	