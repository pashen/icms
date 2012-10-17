{strip}
	<div class="mod_user_friend">
		<h5>{$LANG.FRIEND_ON_SITE} (<span>{$total}</span>)</h5>
        {if $total}
         	{if $cfg.view_type == 'table'}
                {foreach key=tid item=frien from=$friends}
					<div class="mod_user_friend_item">
						<div class="mod_user_friend_avatar">{$frien.avatar}</div>
						<div class="mod_user_friend_name">{$frien.user_link}</div>
					</div>
                {/foreach}
            {/if}
            {if $cfg.view_type == 'list'}
                {assign var="now" value="0"}
                {foreach key=tid item=frien from=$friends}
                    {$frien.user_link}
                    {math equation="x + 1" x=$now assign="now"}
					{if $now==$total}{else}, {/if}
                {/foreach}
            {/if}
        {else}
            <div class="mod_user_friend_noonline">{$LANG.FRIEND_NO_SITE}</div>
        {/if}
	</div>
{/strip}