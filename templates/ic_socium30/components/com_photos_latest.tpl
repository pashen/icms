{strip}
<h1 class="con_heading">{$LANG.NEW_PHOTO_IN_GALLERY}</h1>
	{if $is_latest_yes}
    	{assign var="col" value="1"}
		<div class="line mod_bestphoto">
			{foreach key=tid item=con from=$cons}
				{if $col==1}  {/if}
					<div class="mod_bestphoto_item_box">
						<div class="mod_bestphoto_item">
							<a class="mod_bestphoto_image" href="/photos/photo{$con.id}.html" title="{$con.title|escape:'html'}">
								<img class="photo_thumb_img" src="/images/photos/small/{$con.file}" alt="{$con.title|escape:'html'}" border="0" />
							</a>
							<div class="mod_bestphoto_desc">
								<div class="mod_bestphoto_title">
									<a href="/photos/photo{$con.id}.html" title="{$con.title|escape:'html'}">{$con.title|truncate:18}</a>
								</div>
								<div class="mod_bestphoto_album"><a href="/photos/{$con.album_id}" title="{$con.album|escape:'html'}">{$con.album}</a></div>
								<div class="mod_bestphoto_comments"><a href="/photos/photo{$con.id}.html#c">{$con.comcount}</a></div>
								<span class="mod_bestphoto_date">{$con.fpubdate}</span>
							</div>
						</div>
						<div class="mod_bestphoto_reflect"></div>
					</div>
				{if $col==$maxcols} {assign var="col" value="1"} {else} {math equation="x + 1" x=$col assign="col"} {/if}
			{/foreach}
		</div>
    {else}
    <p>{$LANG.NO_MATERIALS_TO_SHOW}</p>
    {/if}
{/strip}