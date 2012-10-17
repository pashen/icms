{if $is_faq}
	<div class="mod_faq_list">
		{foreach key=aid item=quest from=$faq}	
			<div class="line">
				<img src="/images/markers/faq.png" border="0" />
				<div class="mod_faq_quest">{$quest.quest}</div>
				<span class="mod_faq_date">{$quest.date}</span> <a href="{$quest.href}">{$LANG.LATEST_FAQ_DETAIL}...</a>
			</div>
		{/foreach}
	</div>
{else}
    <p>{$LANG.LATEST_FAQ_NOT_QUES}</p>
{/if}
