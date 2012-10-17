{if $is_uc}
	<div class="uc_random_list">
		{php}
			$i=0;
			$j=0;
			echo '<div class="uc_random_tab" id="uc_random_tab'.$j.'">';
		{/php}
			{foreach key=tid item=item from=$items}
				{php}
					if($i<4): $i++; 
				{/php}
					<div class="uc_random_item">

							<a class="uc_random_img" href="/catalog/item{$item.id}.html">
								<div class="uc_random_img">
									<img src="/images/catalog/small/{$item.imageurl}.jpg" border="0"/>
								</div>
							</a>

						{if $cfg.showtitle}
							<div class="uc_random_title"><a href="/catalog/item{$item.id}.html">{$item.title}</a></div>
					
							{if $item.viewtype == 'shop'}	
								<div class="uc_random_price">{$item.price} {$LANG.UC_RANDOM_RUB}</div>
							{/if}
						{/if}
						{if $cfg.showcat}
							<div class="uc_random_cat"><a href="/catalog/{$item.category_id}">{$item.category}</a></div>
						{/if}
					</div>
				{php}
					else : $i=0; $i++; $j++;
					echo '</div><div class="uc_random_tab" id="uc_random_tab'.$j.'">';
				{/php}
					<div class="uc_random_item">

							<a class="uc_random_img" href="/catalog/item{$item.id}.html">
								<div class="uc_random_img">
									<img src="/images/catalog/small/{$item.imageurl}.jpg" border="0"/>
								</div>
							</a>
	
						{if $cfg.showtitle}
							<div class="uc_random_title"><a href="/catalog/item{$item.id}.html">{$item.title}</a></div>
					
							{if $item.viewtype == 'shop'}	
								<div class="uc_random_price">{$item.price} {$LANG.UC_RANDOM_RUB}</div>
							{/if}
						{/if}
						{if $cfg.showcat}
							<div class="uc_random_cat"><a href="/catalog/{$item.category_id}">{$item.category}</a></div>
						{/if}
					</div>
				{php}
					endif;
				{/php}
			{/foreach}
		</div>
		<div class="uc_random_tab_swicher">
			{php}
				$t=0;
				while ($t<=$j) :
					echo '<span class="uc_random_tab_swicher"><a class="';
					if($t==0): 
					echo 'active';
					endif;
					echo '" title="Перейти к странице" href="#uc_random_tab'.$t.'" id="uc_random_tab_swicher'.$j.'">'.($t+1).'</a></span>';
					$t++;
				endwhile;
			{/php}
		</div>
	</div>
{else}
	<p>{$LANG.UC_RANDOM_NO_ITEMS}</p>
{/if}