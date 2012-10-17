{if $is_uc}
<div class="border_video">
    <div><b>Популярное</b></div>
    {foreach key=tid item=item from=$items}
    <div style="width: 33%; float: left; {if $tid % 3}{else} clear:both;{/if}">
        <div class="v-cat-cat">{$item.cattitle}</div>
        <div class="v-cat-i" >
         
			<div class="v-preview">
				<a class="v-link" title="{$item.title}" href="/video/item{$item.id}.html"><b></b>


                    {if $item.imageurl}

										<img alt="{$item.title}" title="{$item.title}" src="/images/video/small/{$item.imageurl}.jpg" border="0" width="160" height="120"/></a>

								{else}

										<img alt="{$item.title}" title="{$item.title}" src="/images/video/small/nopic.jpg" border="0" width="160" height="120"/></a>

					{/if}

                    
				<div class="v-info">

					<span class="v-time">{$item.rating}</span>
				</div>
			</div>
			<a title="{$item.title}" href="/video/item{$item.id}.html" class="v-name">{$item.title}<i></i></a>
		</div>
    </div>
    {/foreach}
    <div style="clear: both;"></div>
</div>
{else}
	<p>{$LANG.UC_POPULAR_NOOBJECTS}</p>
{/if}