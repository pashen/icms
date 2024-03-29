<div class="con_heading">{$pagetitle}</div>

{if $club}

    {if $is_access}

		<div id="user_profile" class="club_full_entry">
			<div id="user_profile_left">
				<div id="user_profile_left_header"></div>
				<div id="user_profile_left_wrap">
					<div id="left_prof_menu">
					<div class="image"><img src="/images/clubs/{$club.imageurl}" border="0"/></div>
					{if $is_member || $is_admin || $is_moder || $club.member_link}
						<div class="clubmenu">
							<ul class="clubmenu">
                            {if $uid}
                              	{if $is_member || $is_admin || $is_moder} 
									<li><a class="join" href="/clubs/{$club.id}/join_member.html">���������� � ����</a></li>  
                                {/if}
								{if $club.member_link}
									<li>{$club.member_link}</li>
								{/if}
                            {/if}
							{if $is_admin}
								<li><a class="config" href="/clubs/{$club.id}/config.html">{$LANG.CONFIG_CLUB}</a></li>
							{/if}
							</ul>
						</div>			
					{/if}
					</div>
					<div class="data">
						<div class="details">
                            {if $club.is_vip}
                                <div class="line vip"><strong>{$LANG.VIP_CLUB}</strong></div>
                            {else}
                                <div class="line rating"><strong>{$LANG.RATING}:</strong> {$club.rating}</div>
                            {/if}
							<div class="line members"><strong>{$club.members|spellcount:$LANG.USER:$LANG.USER2:$LANG.USER10}</strong></div>
							<div class="line date">{$club.pubdate}</div>
						</div>					
					</div>
					<div class="members_list">
						<div class="title">{$LANG.CLUB_ADMIN}:</div>
						<div class="list">{$club.admin}</div>
					</div>
					{if $club.members_list}
						<div class="members_list">
							<div class="title">{$LANG.CLUB_MEMBERS} ({math equation="x - 1" x=$club.members}):</div>
							<div class="list">{$club.members_list}</div>
						</div>
						{if $is_admin}
							<div class="massmes"><a href="/clubs/{$club.id}/message-members.html" title="{$LANG.SEND_MESSAGE_TO_MEMBERS}">{$LANG.SEND_MESSAGE}</a></div>
						{/if}
					{/if}
				</div>
				<div id="user_profile_left_footer"></div>
			</div>
			<div id="user_profile_right" class="club_right">
				<div id="user_profile_right_wrap">
					<div class="club_description">
							{$club.description}
						</div>
					<div class="clubcontent">
						{if $club.enabled_blogs}
						<div class="blog">
							<div class="title"><a href="{$club.blog_url}">{$LANG.CLUB_BLOG}</a></div>
							<div class="content">{$club.blog_content}</div>
						</div>
						{/if}
						{if $club.enabled_photos}
						<div class="album">
							{if $is_admin || $is_moder || $is_karma_enabled}
								<div class="line">
									<span id="add_album_form" style="display:none">
										<input class="add_album" type="text" class="text" name="album_title" id="album_title"/> 
										<input class="button" type="button" value="{$LANG.CREATE}" onclick="javascript:createAlbum({$club.id}, {$club.root_album_id});"/>
                                        <input class="button" type="button" value="{$LANG.CANCEL}" onclick="{literal}$('#add_album_link').toggle();$('#add_album_form').toggle();{/literal}"/>
									</span>
									<span id="add_album_link"><div class="add_album_link"><a class="service" href="javascript:void(0)" onclick="{literal}$('#add_album_link').toggle();$('#add_album_form').toggle();$('#add_album_form input.text').focus();{/literal}">{$LANG.ADD_PHOTOALBUM}</a></div></span>
									<span id="add_album_wait" style="display:none">{$LANG.LOADING}...</span>
								</div>
							{/if}
							<div class="title"><a href="/photos/{$club.root_album_id}">{$LANG.PHOTOALBUMS}</a></div>
							<div class="content">
							    {if $club.all_albums >= 6}
                                    <span><a href="/photos/{$club.root_album_id}">{$LANG.ALL_ALBUMS} (<strong id="count_photo">{$club.all_albums}</strong>)</a></span>
                                {/if}
								{$club.photo_albums}
							</div>
						</div>
						{/if}
						{if $plugins}
                            {foreach key=id item=plugin from=$plugins}
                                <div id="plugin_{$plugin.name}">{$plugin.html}</div>
                            {/foreach}
                        {/if}
					</div>
					<div class="usr_wall_addlink" style="float: right;">
                        <a href="#addwall" id="addlink" onclick="{literal}$('div#addwall').slideToggle();$('.usr_wall_addlink').toggle();$('.wall_message').focus();{/literal}">
                            <span>{$LANG.WRITE_ON_WALL}</span>
                        </a>
                    </div>
					<div class="wall">
						<div id="addwall" style="display:none">{$club.addwall_html}</div>
						<div class="header">{$LANG.CLUB_WALL}</div>
						<div class="body">
                            <div class="wall_body">{$club.wall_html}</div>
                        </div>
					</div>
				</div>
			</div>
		</div>

        {else}
            <p>{$LANG.CLUB_PRIVATE}</p>
            <p>{$LANG.CLUB_ADMIN}: {$club.admin}</p>
        {/if}

{else}
	<p>{$LANG.CLUB_NOT_FOUND_TEXT}</p>
{/if}