<span>{$LANG.NEXT_USERS_WANT_BE_FRIEND}:</span>

<div class="line" style="margin-top:15px;">
{foreach key=id item=query from=$friends}
    <div class="usr_friends_query_one"><tr>
        <div class="friend_avatar">
            <a href="{profile_url login=$query.sender_login}">
                <img class="usr_img_small" src="{$query.sender_img}" border="0" />
            </a>
        </div>
        <div class="friend_link">
            <div style="margin-bottom:5px"><a class="usr_q_link" href="{profile_url login=$query.sender_login}">{$query.sender}</a></div>
            <div>
                <div><a class="usr_friends_query_yes" href="/users/{$query.from_id}/friendship.html">{$LANG.ACCEPT}</a></div>
                <div><a class="usr_friends_query_no" href="/users/{$query.from_id}/nofriends.html">{$LANG.REJECT}</a></div>
            </div>
        </div>
    </div>
{/foreach}
</div>