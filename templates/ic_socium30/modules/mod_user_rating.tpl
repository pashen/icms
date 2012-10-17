{if $is_usr}
	<div class="mod_user_rating">
		{foreach key=tid item=usr from=$users}
			<div class="mod_user_rating_item">
				<div class="mod_user_rating_avatar">{$usr.usrimage}</div>
				<div class="mod_user_rating_info">
					<a href="{$usr.profileurl}" class="nickname">{$usr.nickname}</a>
					{if $cfg.view_type == 'rating'}
						<div class="rating">({$usr.rating})</div>
					{elseif $usr.karma > 0}
						<div class="karma">(<span style="color:green">+{$usr.karma}</span>)</div>
					{elseif $usr.karma == 0}
						<div class="karma">(<span style="color:gray">{$usr.karma}</span>)</div>
					{else}
						<div class="karma">(<span style="color:red">{$usr.karma}</span>)</div>							
					{/if}
					{if $usr.status}
						<div class="microstatus">{$usr.status}</div>
					{/if}
				</div>
			</div>
		{/foreach}
	</div>
{else}
	<p>Нет данных для отображения.</p>
{/if}