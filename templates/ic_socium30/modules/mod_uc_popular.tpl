{if $is_uc}
    {if $cfg.showtype == 'thumb'}
		<div class="uc_popular_list">
		{php}
			$i=0;
			$j=0;
			echo '<div class="uc_popular_tab" id="uc_popular_tab'.$j.'">';
		{/php}
			{foreach key=tid item=item from=$items}
				{php}
					if($i<$this->_tpl_vars['cfg']['showf']): $i++; 
				{/php}
					<div class="uc_popular_item">
							<a class="uc_popular_img" href="/catalog/item{$item.id}.html">
								<div class="uc_popular_img">
									<img alt="{$item.title|escape:'html'}" src="/images/catalog/small/{$item.imageurl}.jpg" border="0" />
								</div>
							</a>

							<a class="uc_popular_title" href="/catalog/item{$item.id}.html">{$item.title}</a>                                                         

						{if $item.viewtype == 'shop'}

								<a href="/catalog/item{$item.id}.html"><div class="uc_popular_price">{$item.price} {$LANG.UC_POPULAR_RUB}</div></a>                                                             

						{/if}                                                                                                   
					</div> 
{php}
					else : $i=0; $i++; $j++;
					echo '</div><div class="uc_popular_tab" id="uc_popular_tab'.$j.'">';
				{/php}
					<div class="uc_popular_item">

							<a class="uc_random_img" href="/catalog/item{$item.id}.html">
								<div class="uc_popular_img">
									<img alt="{$item.title|escape:'html'}" src="/images/catalog/small/{$item.imageurl}.jpg" border="0" />
								</div>
							</a>

							<a class="uc_popular_title" href="/catalog/item{$item.id}.html">{$item.title}</a>	

						{if $item.viewtype == 'shop'}

								<a href="/catalog/item{$item.id}.html"><div class="uc_popular_price">{$item.price} {$LANG.UC_popular_RUB}</div></a>

						{/if}													
					</div>
				{php}
					endif;
				{/php}					
			{/foreach}
			</div>
			<div class="uc_popular_tab_swicher">
				{php}
					$t=0;
					while ($t<=$j) :
						echo '<span class="uc_popular_tab_swicher"><a class="';
						if($t==0): 
						echo 'active';
						endif;
						echo '" title="Перейти к странице" href="#uc_popular_tab'.$t.'" id="uc_popular_tab_swicher'.$j.'">'.($t+1).'</a></span>';
						$t++;
					endwhile;
				{/php}
			</div>
		</div>
	{/if}
	
	
    {if $cfg.showtype == 'list'}
		<table width="100%" cellspacing="0" cellpadding="4" class="uc_popular_list">
		    {foreach key=tid item=item from=$items}
				<tr>
					<td width="" valign="top"><a class="uc_popular_link" href="/catalog/item{$item.id}.html">{$item.title}</a></td>
							
						{section name=customer start=0 loop=$cfg.showf step=1}
							<td valign="top">{$item.fdata[$smarty.section.customer.index]}</td>
						{/section}
						
					<td width="" align="right" valign="top">{$item.key}</td>
					
							
					<td align="right">		
						{if $item.viewtype == 'shop'}
							<td align="right"><div id="uc_popular_price">{$item.price} {$LANG.UC_POPULAR_RUB}</div></td>     
						{/if}   					
					</td>	
				</tr>
			{/foreach}
		</table>
	{/if}
	
	{if $cfg.fulllink}
	    <div style="margin-top:5px; text-align:right; clear:both"><a class="button" style="padding: 5px;" href="/catalog">{$LANG.UC_POPULAR_CATALOG} {$LANG.UC_POPULAR_ARR}</a></div>
	{/if}
{else}
	<p>{$LANG.UC_POPULAR_NOOBJECTS}</p>
{/if}