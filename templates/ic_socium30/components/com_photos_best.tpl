{strip}
<h1 class="con_heading">{$LANG.BEST_PHOTOS}</h1>
	{if $is_best_yes}
    	{assign var="col" value="1"} {assign var="num" value="1"}
		<div class="line mod_bestphoto">
			{foreach key=tid item=con from=$cons}
				{if $col==1}{/if}
				<div class="mod_bestphoto_item_box">
					<div class="mod_bestphoto_item">
						<a class="mod_bestphoto_image" href="/photos/photo{$con.id}.html" title="{$con.title|escape:'html'}">
							<img class="photo_thumb_img" src="/images/photos/small/{$con.file}" alt="{$con.title|escape:'html'}" border="0" />
						</a>
						<div class="mod_bestphoto_desc">
							<div class="mod_bestphoto_title">
								{$num} <a href="/photos/photo{$con.id}.html" title="{$con.title|escape:'html'}">{$con.title|truncate:18}</a>
							</div>
							<div class="mod_bestphoto_album"><a href="/photos/{$con.album_id}" title="{$con.album|escape:'html'}">{$con.album}</a></div>
							<strong class="mod_bestphoto_rating">{$con.rating}</strong>
							<a class="mod_bestphoto_comments" href="/photos/photo{$con.id}.html#c">{$con.comcount}</a>
						</div>
				   </div>
				   <div class="mod_bestphoto_reflect"></div>
				</div>
				{math equation="x + 1" x=$num assign="num"}
				{if $col==$maxcols}{assign var="col" value="1"} {else} {math equation="x + 1" x=$col assign="col"} {/if}
			{/foreach}
		</div>
    {else}
    <p>{$LANG.NO_MATERIALS_TO_SHOW}</p>
    {/if}
{/strip}