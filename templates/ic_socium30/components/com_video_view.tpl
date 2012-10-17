{* ================================================================================ *}
{* ========================= Просмотр рубрики каталога ============================ *}
{* ================================================================================ *}


    <h1 class="con_heading">{$cat.title}</h1>

{if $cats_html}
    {$cats_html}
{else}
    {$LANG.NO_CAT_IN_CATALOG}
{/if}


{if $itemscount>0}
<div class="border_video">
	{*{if $page>1} <p>Страница {$page}</p> {/if}*}
	

		{foreach key=tid item=item from=$items}

<div style="width: 33%; float: left; {if $tid % 3}{else} clear:both;{/if}">
            <div class="v-cat-i">
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
{if $pagebar}<div class="navigacy">
        {$pagebar}
        </div>{/if}
{/if}