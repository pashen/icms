<form style="margin-top:15px" action="" method="post" name="addform">
	<table border="0" cellspacing="0" cellpadding="6">
		<tr>
			<td width="192"><strong>{$LANG.CAT_NAME}: </strong></td>
			<td width="363"><input name="title" type="text" id="title" size="40" value="{$mod.title|escape:'html'}"/></td>
		</tr>
	</table>
	<p style="margin-top:15px">
		<input class="button" name="goadd" type="submit" id="goadd" value="{$LANG.CAT_SAVE}" />
		<input class="button" name="cancel" type="button" onclick="window.history.go(-1)" value="{$LANG.CANCEL}" />
	</p>
</form>
