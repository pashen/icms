<ul class="mod_blog_list">
{foreach key=tid item=post from=$posts}
	<li>
		<span class="mod_blog_item">
			<span class="mod_blog_karma">{$post.karma}</span>
			<a class="mod_blog_userlink" href="{$post.bloghref}">{$post.blog}</a> <span>&rarr; </span>
			<a class="mod_blog_link" href="{$post.href}">{$post.title}</a> <span class="mod_blog_date">({$post.date})</span>
		</span>
	</li>
{/foreach}
</ul>