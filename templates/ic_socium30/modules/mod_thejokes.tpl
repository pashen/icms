{if $thejokes}
	<p>{$thejokes}</p>
	{if $setstatus}
	<p id="statusinfo" style="display: none; text-align: center; font-size: 10px;">Новый статус установлен!</p>
	{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			$('#statusinfo').fadeIn('slow').fadeOut('slow');
		});
	</script>
	{/literal}
	{/if}
	<table width="100%" border="0">
	<tr>
		{if $user_id}
		<td align="left">
		{literal}
		<script type="text/javascript">
		function submitform()
		{
		    document.forms["statusform"].submit();
		}
		</script>
		{/literal}
			<form method="post" id="statusform" name="statusform">
				<input type="hidden" name="newstatus" value="{$thejokes}" />
				<input type="hidden" name="setstatus" value="YES" />
				<div class="usr_status_link"><a href="javascript:submitform()">Установить как статус</a></div>
			</form>
		{/if}
		</td>
		<td align="right">&copy;&nbsp;<a href="http://thejokes.ru" target="_blank">TheJokes.ru</a></td>
	</tr>
	</table>

{else}
	<p>Шутки временно не доступны :(</p>
{/if}