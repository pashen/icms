<table class="mod_forum_classic">
	{php} $i=0; {/php}
	{foreach key=tid item=thread from=$threads}
		<tr class="line row{php}echo $i+1; {/php}">
			<td class="mod_forum_classic_thread">
				<div><a href="{$thread.topichref}">{$thread.topic}</a></div>
				<div class="mod_forum_classic_thread_desc">{$thread.topicdesc}</div>
			</td>
			<td class="mod_forum_classic_autor">
				<div><span>Автор:</span><br><a href="{$thread.starterhref}">{$thread.starter}</a></div>
			</td>		
			<td class="mod_forum_classic_last">
				<div><span>Последнее сообщение: </span></div>
				<div><span class="mod_forum_classic_date">{$thread.date}</span><br/><a href="{$thread.authorhref}">{$thread.author}</a></div>
			</td>
		</tr>
		{php}$i = 1 - $i;{/php}
	{/foreach}
</table>