<div id="shop_toollink_div">
	<a id="shop_searchlink" href="/catalog/{$cat.id}/search.html">{$LANG.SEARCH_BY_CAT}</a>
	{if $cat.view_type=='shop'} {$shopcartlink}	{/if}
    {if $is_can_add}
    <a id="shop_addlink" href="/catalog/{$cat.id}/add.html">{$LANG.ADD_ITEM}</a>
    {/if}
</div>

{if $cfg.is_rss}
<h1 class="con_heading">{$cat.title} <a href="/rss/catalog/{$cat.id}/feed.rss" title="{$LANG.RSS}"><img src="/images/markers/rssfeed.png" border="0" alt="{$LANG.RSS}"/></a></h1>
{else}
	<h1 class="con_heading">{$cat.title}</h1>
{/if}

{if $cat.description}
	<div class="con_description">{$cat.description}</div>
{/if}

{if $subcats}
	<div class="uc_subcats">{$subcats}</div>
{/if}

{if $alphabet}<div class="line">{$alphabet}</div>{/if}
{if $cat.showsort}<div class="line">{$orderform}</div>{/if}
{if $itemscount>0}

	{if $page>1} <p>Страница {$page}</p> {/if}
	
	{if $search_details} {$search_details} {/if}
		<div id="catalog_list">
		{foreach key=tid item=item from=$items}
				
			{if $cat.view_type=='list' || $cat.view_type=='shop'}
				<div class="catalog_list_item">
					<div class="line">
						<div class="catalog_list_itempic">							
							<div class="catalog_item_img">
								{if $item.imageurl}
									<a class="lightbox-enabled" title="{$item.title|escape:'html'}" rel="lightbox" href="/images/catalog/{$item.imageurl}">
										<img alt="{$item.title|escape:'html'}" src="/images/catalog/small/{$item.imageurl}.jpg" border="0" />
									</a>
								{else}
									<a href="/catalog/item{$item.id}.html"></a>										
								{/if}
							</div>
							{if $cat.view_type=='shop'}
								<div class="shop_small_price">
									<span>{$item.price}</span> {$LANG.RUB}
								</div>
							{/if}
						</div>
						<div class="uc_list_itemdesc">
                            {if $item.can_edit}
                                <div class="uc_item_edit">
                                    <a href="/catalog/{$cat.id}/edit{$item.id}.html" class="uc_item_edit_link">{$LANG.EDIT}</a>
                                </div>
                            {/if}
							{if $cat.is_ratings}
								<div class="uc_rating">{$item.rating}</div>
							{/if}
							<div>
								<a class="uc_itemlink" href="/catalog/item{$item.id}.html">{$item.title}</a> 
								{if $item.is_new}
									<span class="uc_new"><img src="/images/ratings/new.gif" border="0"/></span>
								{/if}									
							</div>
							<div class="uc_itemfieldlist">
								{foreach key=field item=value from=$item.fields}
                                    {if $value}
                                        {if !strstr($field, '/~l~/')}
                                            <div class="uc_itemfield">{$field}: {$value}</div>
                                        {else}
                                            <div class="uc_itemfield">{$value}</div>
                                        {/if}
                                    {/if}
								{/foreach}
							</div>
                            {if $item.tagline && $cat.showtags}
								<div class="uc_tagline round4">{$LANG.TAGS}: {$item.tagline}</div>
							{/if}

							{if $cat.view_type=='list'}
								{if $cat.showmore}
									<div class="shop_list_buttons">
										<a class="more" href="/catalog/item{$item.id}.html">{$LANG.DETAILS}...</a>
									</div>
								{/if}										
							{else}
								<div class="shop_list_buttons">
									<a class="more" href="/catalog/item{$item.id}.html" title="{$LANG.DETAILS}">
										{$LANG.DETAILS}...
									</a> 
									<a class="cart" href="/catalog/addcart{$item.id}.html" title="{$LANG.ADD_TO_CART}">
										{$LANG.ADD_TO_CART}
									</a>
								</div>
							{/if}
						</div>											
					</div>
				</div>
			{/if}
					
			{if $cat.view_type=='thumb'}
				<div class="uc_thumb_item">
					<div class="line">
						<div class="catalog_item_img">
							<a href="/catalog/item{$item.id}.html">
								{if $item.imageurl}
									<img alt="{$item.title|escape:'html'}" src="/images/catalog/small/{$item.imageurl}.jpg" border="0" />
								{/if}
							</a>
						</div>
					</div>
					<div class="line">
						<a class="uc_thumb_itemlink" href="/catalog/item{$item.id}.html">{$item.title}</a>								
					</div>						
				</div>				
			{/if}															
		{/foreach}
		</div>
		{$pagebar}
{/if}