<div class="con_heading">{$LANG.KARMA_HISTORY} - {$usr.nickname}</div>
{if $karma}
<table class="karma_history" width="">
		{foreach key=id item=karm from=$karma}
			<tr>
				<td width="150" valign="middle">{$karm.fsenddate}</td>
				<td width="200" valign="middle"><a href="{profile_url login=$karm.login}">{$karm.nickname}</a></td>
				<td width="100" valign="middle" align="center">{$karm.kpoints}</td>												
			</tr>
		{/foreach}
</table>
{else}
<p>{$LANG.KARMA_NOT_MODIFY}</p>
<p>{$LANG.KARMA_NOT_MODIFY_TEXT}</p>
<p>{$LANG.KARMA_DESCRIPTION}</p>
{/if}