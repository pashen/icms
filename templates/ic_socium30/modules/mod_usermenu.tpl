<div class="mod_user_menu">
	<div class="mod_user_menu_avatar_box">
		{php}
			if ($this->_tpl_vars['avatar']=='<img src="/images/users/avatars/small/" />') :
				echo '<img alt="нет аватара" src="/images/users/avatars/small/nopic.jpg" />';
			else :
				echo $this->_tpl_vars['avatar'];
			endif;
		{/php}
	</div>
	<div class="user_menu_nickname">{$nickname|truncate:15}</div>
	<div class="clear"></div>
	<div class="mod_user_menu_link_box">
		<span class="my_profile">
			<a href="{profile_url login=$login}">К профилю</a>
		</span>
		{if $is_billing}
			<span class="my_balance">
				<a href="{profile_url login=$login}#upr_p_balance" title="Баланс">{if $balance}{$balance}{else}0{/if}</a>
			</span>
		{/if}
		{if $users_cfg.sw_msg}
		<span class="my_messages">
			{if $newmsg}
				<a class="has_new" href="/users/{$id}/messages.html">{$LANG.USERMENU_MESS} ({$newmsg})</a>
			{else}
				<a href="/users/{$id}/messages.html">{$LANG.USERMENU_MESS}</a>
			{/if}
		</span>
		{/if}

		{if $users_cfg.sw_blogs}
		<span class="my_blog">
			<a href="{$blog_href}">{$LANG.USERMENU_MY_BLOG}</a>
		</span>
		{/if}

		{if $users_cfg.sw_photo}
		<span class="my_photos">
			<a href="/users/{$id}/photoalbum.html">{$LANG.USERMENU_PHOTOS}</a>
		</span>
		{/if}

		{if $is_can_add && !$is_admin && !$is_editor}
		<span class="my_content">
			<a href="/content/my.html">{$LANG.USERMENU_ARTICLES}</a>
		</span>

		<span class="add_content">
			<a href="/content/add.html">{$LANG.USERMENU_ADD_ARTICLE}</a>
		</span>
		{/if}

		{if $is_admin || $is_editor}
		<span class="admin">
			<a href="/admin" target="_blank">{$LANG.USERMENU_ADMININTER}</a>
		</span>
		{/if}
		<span class="logout">
			<a href="/logout">{$LANG.USERMENU_EXIT}</a>
		</span>
	</div>
</div>
