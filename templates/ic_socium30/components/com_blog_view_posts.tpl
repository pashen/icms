<div class="con_heading">{$pagetitle}</div>

{if $is_latest}
    <div class="blog_type_menu">

            {if !$ownertype}
                <span class="button blog_type_active">{$LANG.POSTS_RSS}</span>
            {else}
                <a class="button blog_type_link" href="/blogs">{$LANG.POSTS_RSS}</a>
            {/if}

             {if $ownertype == 'all'}
                <span class="button blog_type_active">{$LANG.ALL_BLOGS}</span>
             {else}
                <a class="button blog_type_link" href="/blogs/all.html">{$LANG.ALL_BLOGS}</a>
             {/if}

            {if $single_blogs && $multi_blogs}
                {if $ownertype == 'single'}
                    <span class="button blog_type_active">{$LANG.PERSONALS}</span>
                {else}
                    <a class="button blog_type_link" href="/blogs/single.html">{$LANG.PERSONALS}</a>
                {/if}
            {/if}

            {if $single_blogs && $multi_blogs}
                {if $ownertype == 'multi' && $multi_blogs}
                    <span class="button blog_type_active">{$LANG.COLLECTIVES}</span>
                {else}
                    <a class="button blog_type_link" href="/blogs/multi.html">{$LANG.COLLECTIVES}</a>
                {/if}
            {/if}

    </div>
{/if}


{if $is_posts==true}
	<div class="blog_entries">
		{foreach key=tid item=post from=$posts}
			<div class="blog_entry">
				<div class="line blog_records">
					<div class="line blog_entry_title_td">
						<div class="blog_entry_title">
                            {if $post.blog_url}
                                <a class="blog_entry_title" href="{$post.blog_url}">{$post.blog_title}</a> &rarr;
                            {/if}
                            <a href="{$post.url}">{$post.title}</a>
                        </div>							
						<div class="blog_entry_info">{$post.author} <span class="blog_entry_date">{$post.fpubdate}</span></div>
					</div>
					<div class="line">
						<div class="blog_entry_text">{$post.msg}</div>
						<div class="blog_comments">
                            <span class="post_karma">{$post.karma}</span>
							{if ($post.comments > 0)}
								<a class="blog_comments_link" href="{$post.url}#c">{$post.comments|spellcount:$LANG.COMMENT:$LANG.COMMENT2:$LANG.COMMENT10}</a>
							{else}
								<a class="blog_comments_link" href="{$post.url}#c">{$LANG.NOT_COMMENTS}</a>
							{/if}
						{if $post.tagline != false}
							<span class="tagline">{$post.tagline}</span>
						{/if}
						{if $myblog || $post.user_id == $uid || $is_admin}
							<span class="editlinks">
								| <a href="/blogs/{$post.blog_id}/editpost{$post.id}.html" class="blog_entry_edit">{$LANG.EDIT}</a>
								| <a href="/blogs/{$post.blog_id}/delpost{$post.id}.html" class="blog_entry_delete">{$LANG.DELETE}</a>
							</span>
						{/if}
						</div>
					</div>
				</div>
			</div>
		{/foreach}		
	</div>	
	
	{$pagination}
{else}
	<p style="clear:both">{$LANG.NOT_POSTS}</p>
{/if}
