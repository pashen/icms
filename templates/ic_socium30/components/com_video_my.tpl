
	{* ============================== Просто заголовок ==================================== *}
    <h1 class="con_heading">Мое видео</h1>

{if $cats_html}
    {$cats_html}
{else}
    {$LANG.NO_CAT_IN_CATALOG}
{/if}



<div class="border_video">

	{if $items}
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

                    {*<img width="160" height="120" src="http://content.video.mail.ru/corp/lv-zo/_legalvideo/p-5886.jpg"></a>*}


				<div class="v-info">

					<span class="v-time">{$item.rating}</span>
				</div>
			</div>
			<a title="{$item.title}" href="/video/item{$item.id}.html" class="v-name">{$item.title}<i></i></a>
                <a href="/video/{$cat.id}/edit{$item.id}.html" class="uc_item_edit_link">{$LANG.EDIT}</a>
		</div>
            
</div>

		{/foreach}
        {else}
        У Вас нет пока добавленных видео.
        {/if}
		<div style="clear: both;"></div>
		
</div>
