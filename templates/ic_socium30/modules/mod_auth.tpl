<form action="/login" method="post" name="authform" style="margin:0px" target="_self" id="authform">
	<div class="login_form">
		<div class="line loginline">
			<span><input name="login" type="text" class="login_input" value="Логин" onclick="this.value=''" /></span>
		</div>
		<div class="line passline">
			<span><input name="pass" type="password" class="pass_input" value="Пароль" onclick="this.value=''"/></span>
		</div>
		<div class="line buttonline">
			{if $cfg.autolog}
			<span class="remember" style=""><input name="remember" type="checkbox" checked="checked" id="remember" value="1" title="{$LANG.AUTH_REMEMBER}" style="margin-right:0px"/> <span>Запомнить</span></span>
		{/if}
		<span><input class="login_btn" type="submit" name="Submit" value="Войти" /></span>
		</div>
		<div class="line buttonline">
			<span class="loginzaline">{php}cmsCore::callEvent('LOGINZA_BUTTON', array());{/php} </span>
		</div>
		<div class="line login_option">
			{if $cfg.passrem}
				<span class="remind_btn"><a href="/passremind.html" title="{$LANG.AUTH_FORGOT}"><span>Забыли пароль?</span></a></span> | 
			{/if}
			<span class="registration_btn"><a href="/registration" title="Регистрация"><span>Регистрация</span></a></span>
		</div>
	</div>
</form>