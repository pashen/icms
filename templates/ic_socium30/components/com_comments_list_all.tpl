<h1 class="con_heading">{$LANG.COMMENTS_ON_SITE}</h1>
{if $comments_count}
	{foreach key=cid item=comment from=$comments}
    	<div class="cmm_entry line">
		<div class="cmm_all_title"><span class="cmm_all_author">{if !$comment.is_profile}{$comment.author}{else}<a href="{profile_url login=$comment.author.login}">{$comment.author.nickname}</a>{/if} {if $is_admin}{$comment.ip}{/if}</span> <span class="cmm_all_gender"> {$comment.gender}</span>  &rarr; <a class="cmm_all_target" href="{$comment.target_link}#c{$comment.id}" title="{$LANG.LINK_TO_COMMENT}">{$comment.target_title}</a> <span class="cmm_date">{$comment.fpubdate}</span> <span class="cmm_all_votes">{$comment.votes}</span></div>
			{if $comment.is_profile}
					<div class="cmm_avatar"><a href="{profile_url login=$comment.author.login}">{$comment.user_image}</a></div>
					<div class="cmm_content_av">
				{else}
					<div class="cmm_avatar">
						<span><img src="/images/users/avatars/small/nopic.jpg" alt=" ".></span>
					</div>
					<div class="cmm_content_av">
				{/if}
					{if $comment.show}
						{$comment.content}
					{else}
						<a href="javascript:void(0)" onclick="expandComment({$comment.id})" id="expandlink{$comment.id}">{$LANG.SHOW_COMMENT}</a>
						<div id="expandblock{$comment.id}" style="display:none">{$comment.content}</div>
					{/if}
					</div>
			</div>
	{/foreach}
{$pagebar}
{else}
 	<p>{$LANG.NOT_COMMENT_TEXT}</p>
{/if}