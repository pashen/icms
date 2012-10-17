{if $is_con}
{if $cfg.is_pag}<script type="text/javascript" src="/modules/mod_latest/js/latest.js" ></script>{/if}
{if !$is_ajax}<div id="module_ajax_{$module_id}" class="mod_latest_list">{/if}
	{php} $i=0; {/php}
	{foreach key=aid item=article from=$articles}
		<div class="mod_latest_entry row{php}echo $i+1; {/php}">
			<a class="mod_latest_title" href="{$article.href}">{$article.title|truncate:50|strip_tags:false}</a>
			{if $cfg.showdesc}
				{if $article.image}
					<div class="mod_latest_image">
						<img src="/images/photos/small/{$article.image}" border="0" alt="{$article.title|escape:'html'}"/>
					</div>
				{else}
					<div class="mod_latest_no_image"> </div>
				{/if}
			{/if}
			{if $cfg.showdesc}
				<div class="mod_latest_desc">   
					{$article.description|strip_tags:false}	
					<a href="{$article.href}" class="mod_latest_readmore">Подробнее...</a>					
				</div>
			{/if}
			<div class="mod_latest_more">
				{if $cfg.showdate}
					<div class="mod_latest_info">
						<div class="mod_latest_date">
							{$article.date} - {if $cfg.showcom}<a href="{$article.href}" title="{$article.comments|spellcount:$LANG.COMMENT1:$LANG.COMMENT2:$LANG.COMMENT10}" class="mod_latest_comments">{$article.comments}</a> - <span class="mod_latest_hits">{$article.hits}</span>{/if}
							<a href="{$article.authorhref}">{$article.author}</a>
						</div>
					</div>
				{/if}	
			</div>
		</div>
		{php}$i = 1 - $i;{/php}
	{/foreach}
{if $cfg.is_pag && $pagebar_module}
    <div class="mod_latest_pagebar">{$pagebar_module}</div>
{/if}
{if $cfg.showrss}
	<div class="mod_latest_rss">
		<a href="/rss/content/{$rssid}/feed.rss">{$LANG.LATEST_RSS}</a>
	</div>
{/if}
{if !$is_ajax}</div>{/if}
{else}
    <p>{$LANG.LATEST_NOT_MATERIAL}</p>
{/if}