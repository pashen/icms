{if $cfg.rss_one}
	<div class="line">
			<h1 class="con_heading" style="display: inline">{$blog.title}</h1>
			<a href="/rss/blogs/{$blog.id}/feed.rss" title="{$LANG.RSS}">
                <img src="/templates/ic_socium30/images/icons/rss.png" border="0" alt="{$LANG.RSS}"/>
            </a>
	</div>
{else}
	<h1 class="con_heading">{$blog.title}</h1>
{/if}
{if !$myblog}
	{if $blog.ownertype == 'single'}
		<div class="line blog_desc">
			<strong>{$LANG.BLOG_AVTOR}:</strong>
			{$blog.author}
		</div>
	{else}
		<div class="line blog_desc">
			<strong>{$LANG.BLOG_ADMIN}:</strong>
			{$blog.author}
		</div>
	{/if}
{/if}

{if $myblog || $is_author || $is_admin}
    <div class="blog_toolbar">
		{if $myblog || $is_admin}
			<ul>
				{if $on_moderate && ($is_admin || $is_moder || $myblog)}
					<li><a class="blog_moderate_link" href="/blogs/{$blog.id}/moderate.html">{$LANG.MODERATING} <b>({$on_moderate})</b></a></li>
				{/if}						
				<li><a class="blog_add_link" href="/blogs/{$blog.id}/newpost{if $cat_id>0}{$cat_id}{/if}.html">{$LANG.NEW_POST}</a></li>
				{if $blog.owner=='user' || $is_moder || $is_admin}
					<li><a class="blog_addcat_link" href="/blogs/{$blog.id}/newcat.html">{$LANG.NEW_CAT}</a></li>
					{if $cat_id>0}
						<li><a class="blog_editcat_link" href="/blogs/{$blog.id}/editcat{$cat_id}.html">{$LANG.RENAME_CAT}</a></li>
						<li><a class="blog_delcat_link" href="/blogs/{$blog.id}/delcat{$cat_id}.html">{$LANG.DEL_CAT}</a></li>
					{/if}
				{/if}
				{if $is_config}
					<li><a class="blog_conf_link" href="/blogs/{$blog.id}/editblog.html">{$LANG.CONFIG}</a></li>
				{/if}
			</ul>
		{elseif $is_author}
			<ul>
				<li><a class="blog_add_link" href="/blogs/{$blog.id}/newpost{if $cat_id>0}{$cat_id}{/if}.html">{$LANG.NEW_POST}</a></li>
			</ul>
		{/if}
    </div>
{/if}
{if $blogcats != false}
	{$blogcats}
{/if}
{if $is_posts==true}
	<div class="blog_entries">
		{foreach key=tid item=post from=$posts}
			<div class="blog_entry">
				<div class="line blog_records">
					<div class="blog_entry_title_td line">
						<div class="blog_entry_title"><a href="{$post.url}">{$post.title}</a></div>
						<div class="blog_entry_karma">{$post.karma}</div>
						<div class="blog_entry_info">{$post.author} &rarr; <span class="blog_entry_date">{$post.fpubdate}</span></div>
					</div>
				</div>
				<div class="line">
							<div class="blog_entry_text">{$post.msg}</div>
							<div class="blog_comments">
								{if ($post.comments > 0)}
									<a class="blog_comments_link" href="{$post.url}#c">{$post.comments|spellcount:$LANG.COMMENT:$LANG.COMMENT2:$LANG.COMMENT10}</a>
								{else}
									<a class="blog_comments_link" href="{$post.url}#c">{$LANG.NOT_COMMENTS}</a>
								{/if}
							{if $post.tagline != false}
								 <span class="tagline">{$post.tagline}</span>
							{/if}
							{if $post.user_id == $uid || $is_admin || $is_moder || $myblog}
								<span class="editlinks">
									| <a href="/blogs/{$blog.id}/editpost{$post.id}.html" class="blog_entry_edit">{$LANG.EDIT}</a>
									| <a href="/blogs/{$blog.id}/delpost{$post.id}.html" class="blog_entry_delete">{$LANG.DELETE}</a>
								</span>
							{/if}
							</div>
				</div>
			</div>
		{/foreach}		
	</div>	
	
	{$pagination}
{else}
	<p style="clear:both">{$LANG.NOT_POSTS}</p>
{/if}
