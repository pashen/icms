<div class="con_heading">{$LANG.SEND_INVITE_CLUB} "{$club.title}"</div>
<form action="" method="post" name="addform">
<span style="font-size:16px;">{$LANG.SELECT_FRIEND}:</span>
<select name="usr_to_id" id="usr_to_id" style="width:200px">{$friends}</select>
<div style="margin-top:10px;">
   <input class="button" type="submit" name="join" value="{$LANG.INVITE}" style="font-size:16px"/>
   <input class="button" type="button" name="gosend" value="{$LANG.CANCEL}" style="font-size:16px" onclick="window.history.go(-1)"/>
</div>
</form>