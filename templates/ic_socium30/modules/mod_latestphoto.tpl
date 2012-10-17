{if $is_photo}
	<div class="mod_bestphoto">
        {foreach key=tid item=con from=$photos}
			<div class="mod_bestphoto_item_box">
				<div class="mod_bestphoto_item">
					<a class="mod_bestphoto_image" href="/photos/photo{$con.id}.html" title="{$con.title|escape:'html'}"><img class="photo_thumb_img" src="/images/photos/small/{$con.file}" alt="{$con.title|escape:'html'}" border="0" /></a>
					{if $cfg.showtype == 'full'}
						<div class="mod_bestphoto_desc">
							<div class="mod_bestphoto_title"><a href="/photos/photo{$con.id}.html" title="{$con.title|escape:'html'}">{$con.title|truncate:18}</a></div>
							{if $cfg.showalbum}
								<div class="mod_bestphoto_album"><a href="/photos/{$con.album_id}" title="{$con.album|escape:'html'}">{$con.album|truncate:18}</a></div>
							{/if}
							{if $cfg.showcom}
								<a class="mod_bestphoto_comments" href="/photos/photo{$con.id}.html#c">{$con.comments}</a>
							{/if}
							{if $cfg.showdate}
								<div><span class="mod_bestphoto_date">{$con.fpubdate}</span></div>
							{/if}
						</div>
					{/if}
				</div>
				<div class="mod_bestphoto_reflect"></div>
			</div>
  		{/foreach}
	</div>
	{if $cfg.showmore}
		<div style="text-align:right"><a class="button" style="padding: 5px;" href="/photos/latest.html">{$LANG.LATESTPHOTO_ALLNEW} &rarr;</a></div>
	{/if}
{else}
<p>{$LANG.LATESTPHOTO_NO_MATERIAL}</p>
{/if}