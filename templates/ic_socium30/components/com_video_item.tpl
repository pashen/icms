{* ========================================================================= *}
{* ==================== ����� ������ �������������� �������� =============== *}
{* ========================================================================= *}

{* =========================== ������ �� ������� =========================== *}
{*{if $cat.view_type=='shop'}*}
	{*<div id="shop_toollink_div">*}
		{*{$shopCartLink}*}
    {*</div>*}
{*{/if}*}
			
{* =============================== ��������� =============================== *}
<div class="con_heading">{$item.title}</div>
{if $cats_html}
    {$cats_html}
{else}
    {$LANG.NO_CAT_IN_CATALOG}
{/if}
<div class="border_video_vid">

{$item.video_code}


</div>
{* =================================== ���� ============================= *}

{if ($cat.showtags) && ($tagline)}
    <div class="uc_detailtags"><strong>{$LANG.TAGS}: </strong>{$tagline}</div>
{/if}
			
{* ================================== ������� ============================ *}
<div class="border_video">
{if $cat.is_ratings}
	{$ratingForm}
{/if}
 <div class="video_info">
     <strong>�������:</strong> {$getProfileLink} <br>
     {if $item.descr}<strong>��������:</strong> {$item.descr} {/if}
 </div>
</div>

