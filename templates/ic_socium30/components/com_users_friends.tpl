<div class="con_heading">
	<a href="{profile_url login=$usr.login}">{$usr.nickname}</a> &rarr; {$LANG.FRIENDS} ({$total})
</div>
<div class="users_list">
	{if $friends}
		{foreach key=tid item=friend from=$friends}
			<div class="line">
				<div class="avatar"><a href="{profile_url login=$friend.login}">{$friend.avatar}</a></div>
				<div class="status">{$friend.flogdate}<br />
					<a href="/users/{$friend.id}/sendmessage.html">{$LANG.WRITE_MESS}</a>
					{if $myprofile}<br /><a href="/users/{$friend.id}/nofriends.html">{$LANG.STOP_FRIENDLY}</a>{/if}
				</div>
				<div class="nickname">
					<a class="friend_link" href="{profile_url login=$friend.login}">{$friend.nickname}</a><br />
					{if $friend.status}
						<span class="microstatus">{$friend.status}</span>
					{/if}    
				</div>
			</div>
		{/foreach}
	{/if}
</div>
{$pagebar}