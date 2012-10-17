<div class="mod_fweb2">
	<ul>
		{foreach key=tid item=thread from=$threads}
			<li>
				<div class="mod_fweb2_date" width="70"><div style="text-align:center">{$thread.date}</div></div>
				<div class="mod_fweb2_thread">
					{if !$thread.secret}
						<img src="/templates/ic_socium30/images/icons/user_comment.png" border="0" />
					{else}
						<img src="/templates/ic_socium30/images/icons/user_silhouette.png" border="0" title="Скрытая тема - видна только вашей группе"/>
					{/if}
					<a href="{$thread.authorhref}" class="mod_fweb2_userlink">{$thread.author}</a> {$thread.act} &laquo;<a href="{$thread.topichref}" class="mod_fweb2_topiclink">{$thread.topic}</a>&raquo;
					{if $cfg.showforum neq 0} на форуме &laquo;<a href="{$thread.forumhref}">{$thread.forum}</a>&raquo;{/if}
				</div>
				{if $cfg.showtext neq 0}
					<div class="mod_fweb2_shorttext line">{$thread.msg}</div>			
				{/if}
			</li>
		{/foreach}
	</ul>
</div>