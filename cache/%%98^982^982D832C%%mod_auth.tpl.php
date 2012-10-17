<?php /* Smarty version 2.6.19, created on 2012-10-17 13:03:40
         compiled from mod_auth.tpl */ ?>
<form action="/login" method="post" name="authform" style="margin:0px" target="_self" id="authform">
    <table class="authtable" width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
            <td width="60"><?php echo $this->_tpl_vars['LANG']['AUTH_LOGIN']; ?>
:</td>
            <td width=""><input name="login" type="text" id="login" /></td>
        </tr>
        <tr>
            <td height="30" valign="top"><?php echo $this->_tpl_vars['LANG']['AUTH_PASS']; ?>
:</td>
            <td valign="top"><input name="pass" type="password" id="pass" /></td>
        </tr>
        <?php if ($this->_tpl_vars['cfg']['autolog']): ?>
            <tr>
                <td valign="top">&nbsp;</td>
                <td valign="top" align="right">
                    <table border="0" cellspacing="0" cellpadding="3">
                    <tr>
                        <td width="20">
                            <input name="remember" type="checkbox" id="remember" value="1" checked="checked"  style="margin-right:0px"/> 
                        </td>
                        <td>
                            <label for="remember"> <?php echo $this->_tpl_vars['LANG']['AUTH_REMEMBER']; ?>
</label>
                        </td>
                    </tr>
                    </table>
                </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td height="27" colspan="2" align="right" valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="3">
                    <tr>
                        <td width="87%">                            
                            <?php if ($this->_tpl_vars['cfg']['passrem']): ?>
                                <a href="/passremind.html"><?php echo $this->_tpl_vars['LANG']['AUTH_FORGOT']; ?>
</a>
                            <?php endif; ?>
                        </td>
                        <td width="13%" align="right"><input id="login_btn" type="submit" name="Submit" value="<?php echo $this->_tpl_vars['LANG']['AUTH_ENTER']; ?>
" /></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>