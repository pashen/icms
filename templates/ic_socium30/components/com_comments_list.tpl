{if $comments_count}
	{foreach key=cid item=comment from=$comments}
        {math equation="x+1" x=$cid assign="next"}        
		<a name="c{$comment.id}"></a>
        {if $comment.level < $cfg.max_level-1}
            <div style="margin-left:{math equation="x*35" x=$comment.level}px;">
        {else}
            <div style="margin-left:{math equation="(x-1)*35" x=$cfg.max_level}px;">
        {/if}
        <div class="cmm_entry line">
			<div class="line">
				<div class="cmm_title">
					{if !$comment.is_profile}
						<span class="cmm_author">{$comment.author} {if $is_admin}{$comment.ip}{/if}</span>
					{else}
						<span class="cmm_author"><a href="{profile_url login=$comment.author.login}">{$comment.author.nickname}</a> {if $is_admin}{$comment.ip}{/if}</span>
					{/if}
                        <a class="cmm_anchor" href="#c{$comment.id}" title="{$LANG.LINK_TO_COMMENT}">#</a>
						<span class="cmm_date">{$comment.fpubdate}</span>
                        {if !$is_user || $comment.is_voted}
                            <span class="cmm_votes">{$comment.votes}</span>
                        {else}
                            <span class="cmm_votes" id="votes{$comment.id}">
                                <span>{$comment.votes}</span>
                                <a class="minus" href="javascript:void(0);" onclick="voteComment({$comment.id}, -1);" title="{$LANG.BAD_COMMENT}">&nbsp;</a>
                                <a class="plus" href="javascript:void(0);" onclick="voteComment({$comment.id}, 1);" title="{$LANG.GOOD_COMMENT}">&nbsp;</a>
                            </span>
                        {/if}
				</div>
			</div>
			<div class="line">
				{if $comment.is_profile}
					<div class="cmm_avatar">
						<a href="{profile_url login=$comment.author.login}">{$comment.user_image}</a>
					</div>
					<div class="cmm_content_av">
				{else}
					<div class="cmm_avatar">
						<span><img src="/images/users/avatars/small/nopic.jpg" alt=" ".></span>
					</div>
					<div class="cmm_content_av">
				{/if}
					{if $comment.show}
						<span>{$comment.content}</span>
					{else}
						<a href="javascript:void(0)" onclick="expandComment({$comment.id})" id="expandlink{$comment.id}">{$LANG.SHOW_COMMENT}</a>
						<div id="expandblock{$comment.id}" style="display:none">{$comment.content}</div>
					{/if}
                        {if $is_user}
							<div class="line" style="margin-top: 10px;">
								<div class="cmm_options">
									<a href="javascript:void(0)" onclick="addComment('{php}echo md5(session_id());{/php}', '{$target|escape:'html'}', '{$target_id}', {$comment.id})">{$LANG.REPLY}</a>
									{if $is_admin || ($comment.is_my && $comment.is_editable && $comment.content_bbcode)}
										{if !$comment.content_bbcode}
											| <a href="/admin/index.php?view=components&do=config&id=7&opt=edit&item_id={$comment.id}">{$LANG.EDIT}</a>
										{else}
											| <a href="javascript:" onclick="editComment('{php}echo md5(session_id());{/php}', '{$comment.id}')">{$LANG.EDIT}</a>
										{/if}
									{/if}
									{if $is_admin || ($comment.is_my && $user_can_delete) || $user_can_moderate}
										| <a href="/comments/delete/{$comment.id}">{if $comments[$next].level > $comment.level}{$LANG.DELETE_BRANCH}{else}{$LANG.DELETE}{/if}</a>
									{/if}
								</div>
							</div>
                        {/if}
					</div>
				</div>
			</div>
            <div id="cm_addentry{$comment.id}" class="reply" style="display:none"></div>
        </div>
	{/foreach}

{else}
    <p>{$labels.not_comments}</p>
{/if}