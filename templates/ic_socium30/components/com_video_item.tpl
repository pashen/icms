{* ========================================================================= *}
{* ==================== Вывод записи универсального каталога =============== *}
{* ========================================================================= *}

{* =========================== Ссылка на корзину =========================== *}
{*{if $cat.view_type=='shop'}*}
	{*<div id="shop_toollink_div">*}
		{*{$shopCartLink}*}
    {*</div>*}
{*{/if}*}
			
{* =============================== Заголовок =============================== *}
<div class="con_heading">{$item.title}</div>
{if $cats_html}
    {$cats_html}
{else}
    {$LANG.NO_CAT_IN_CATALOG}
{/if}
<div class="border_video_vid">

{$item.video_code}


</div>
{* =================================== Теги ============================= *}

{if ($cat.showtags) && ($tagline)}
    <div class="uc_detailtags"><strong>{$LANG.TAGS}: </strong>{$tagline}</div>
{/if}
			
{* ================================== Рейтинг ============================ *}
<div class="border_video">
{if $cat.is_ratings}
	{$ratingForm}
{/if}
 <div class="video_info">
     <strong>Добавил:</strong> {$getProfileLink} <br>
     {if $item.descr}<strong>Описание:</strong> {$item.descr} {/if}
 </div>
</div>

