{if $is_item}
	<div class="mod_pcat_price_list">
		{foreach key=tid item=item from=$items}
			<div class="line">
				{if $item.is_icon}
					<img src="{$cfg.icon}" border="0" />
				{/if}
					{if !$item.is_current}
						<a href="{$item.link}" class="mod_pcat_link">
					{else}
						<div class="mod_pcat_current">
					{/if}
					{$item.title}
					{if !$item.is_current}
						</a>
					{else}
						</div>
					{/if}

			{if $cfg.showdesc}
					<div class="mod_pcat_desc">{$item.description}</div>
			{/if}					
			</div>	
		{/foreach}
	</div>
{else}
	<p>Нет категорий для отображения.</p>
{/if}