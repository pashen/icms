{if $is_clubs}
	<div class="mod_clubs line">
		{foreach key=tid item=club from=$clubs}
			<div class="mod_clubs_entry">
				<div class="line">
					<div class="mod_clubs_image">
						<a href="/clubs/{$club.id}" title="{$club.title|escape:'html'}">
							<img src="/images/clubs/small/{$club.imageurl}" border="0" alt="{$club.title|escape:'html'}"/>
						</a>
					</div>	
				<div class="mod_clubs_title">
					<a href="/clubs/{$club.id}">{$club.title}</a>
				</div>					
					<div class="mod_clubs_data">
						<div class="details">
							<span class="mod_clubs_rating"><strong>Рейтинг</strong> : {$club.rating}</span>
							
							<span class="mod_clubs_members"><strong>{$club.members|spellcount:$LANG.CLUBS_USER:$LANG.CLUBS_USER2:$LANG.CLUBS_USER10}</strong></span>
						</div>
					</div>
				</div>
			</div>
		{/foreach}
	</div>
{else}
    <p>{$LANG.LATESTCLUBS_NOT_CLUBS}</p>
{/if}
