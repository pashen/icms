<div class="con_heading">{$LANG.POSTS_ON_MODERATE}</div>

<div><strong>{$LANG.POSTS_COUNT}:</strong> {$total} | <a href="{$blog.url}">{$LANG.BACK_TO_BLOG}</a></div>

<div class="blog_entries">
	{foreach key=tid item=post from=$posts}
		<div class="blog_entry">
			<table width="100%" cellspacing="0" cellpadding="5" class="blog_records">
				<tr>
					<td width="" class="blog_entry_title_td">
						<div class="blog_entry_title"><a href="{$post.url}">{$post.title}</a></div>
						<div class="blog_entry_info"><a href="{profile_url login=$post.author_login}">{$post.author}</a> &rarr; <span class="blog_entry_date">{$post.fpubdate}</span></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="blog_entry_text">{$post.msg}</div>
						<div class="blog_comments"><a class="blog_moderate_yes" href="/blogs/{$id}/publishpost{$post.id}.html">{$LANG.ALLOW}</a>
							 | <a class="blog_moderate_no" href="/blogs/{$id}/delpost{$post.id}.html">{$LANG.DELETE}</a>
							{if $post.tagline != false}
								 | <strong>{$LANG.TAGS}:</strong> {$post.tagline}
							{/if}
								 | <a href="/blogs/{$blog.id}/editpost{$post.id}.html" class="blog_entry_edit">{$LANG.EDIT}</a>
						</div>
					</td>
				</tr>
			</table>
		</div>
	{/foreach}
</div>

