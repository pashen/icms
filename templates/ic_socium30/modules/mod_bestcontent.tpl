<ul class="mod_bcon_list">
	{foreach key=tid item=article from=$articles}
		<li>
			<span class="mod_bcon_karma">{$article.karma}</span>
			<a class="mod_bcon_content" href="{$article.href}">{$article.title}</a> 
			<div class="line mod_bcon_info">
				<span class="mod_bcon_date">{$article.date}</span> (<a class="mod_bcon_userlink" href="{$article.authorhref}">{$article.author}</a>)
			</div>
			{if $cfg.showdesc neq 0}
				<div class="line"><span class="mod_bcon_desc">{$article.description}</span></div>							  
				<div class="line"><a class="mod_bcon_readmore" href="{$article.href}">Подробнее...</a></div>
			{/if}
		</li>								
	{/foreach}
</ul>
{if $cfg.showlink neq 0}
	<div style="text-align:right">
		<br />
		<a class="button" style="padding: 5px;" href="/content/top.html">Полный рейтинг &rarr;</a>
	</div>
{/if}