{if $is_best}
	<div class="mod_bestphoto">
		{foreach key=tid item=con from=$cons}
			<div class="mod_bestphoto_item_box">
				<div class="mod_bestphoto_item">
					<a class="mod_bestphoto_image" href="/photos/photo{$con.id}.html" title="{$con.title|escape:'html'}"> <img class="photo_thumb_img" src="/images/photos/small/{$con.file}" alt="{$con.title|escape:'html'} ({$con.rating})" border="0" /></a>
					{if $cfg.showtype == 'full'}
						<div class="mod_bestphoto_desc">
							<div class="mod_bestphoto_title"><a href="/photos/photo{$con.id}.html" title="{$con.title|escape:'html'} ({$con.rating})">{$con.title|truncate:18}</a></div>
							{if $cfg.showalbum}
								<div class="mod_bestphoto_album"><a href="/photos/{$con.album_id}" title="{$con.album}">{$con.album|truncate:18}</a></div>
							{/if}
							{if $cfg.showrating}
								{if $cfg.sort == 'rating'}
									<strong class="mod_bestphoto_rating">{$con.votes}</strong>
								{else}
									{$con.votes}
								{/if}
							{/if}
							{if $cfg.showcom}
								<a class="mod_bestphoto_comments" href="/photos/photo{$con.id}.html#c">{$con.comments}</a>
							{/if}
							{if $cfg.showdate}
								<div>
									<span class="mod_bestphoto_date">{$con.pubdate}</span>
								</div>
							{/if}
						</div>
					{/if}
				</div>
				<div class="mod_bestphoto_reflect"></div>
			</div>
		{/foreach}
	</div>
{if $cfg.showmore}
	<div style="text-align:right"><a class="button" style="padding: 5px;" href="/photos/top.html">{$LANG.BESTPHOTO_ALL_BEST_PHOTO} &rarr;</a></div>
{/if}
{else}
	<p>{$LANG.BESTCONTENT_NOT_MATERIALS}</p>
{/if}