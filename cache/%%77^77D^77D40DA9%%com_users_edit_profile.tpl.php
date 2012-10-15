<?php /* Smarty version 2.6.19, created on 2012-10-15 10:32:54
         compiled from com_users_edit_profile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'add_js', 'com_users_edit_profile.tpl', 5, false),array('function', 'add_css', 'com_users_edit_profile.tpl', 6, false),array('modifier', 'escape', 'com_users_edit_profile.tpl', 44, false),)), $this); ?>

<?php echo cmsSmartyAddJS(array('file' => 'includes/jquery/tabs/jquery.ui.min.js'), $this);?>

<?php echo cmsSmartyAddCSS(array('file' => 'includes/jquery/tabs/tabs.css'), $this);?>


<?php echo '
	<script type="text/javascript">
		$(document).ready(function(){
			$("#profiletabs > ul#tabs").tabs();
		});
	</script>
'; ?>


<div class="con_heading"><?php echo $this->_tpl_vars['LANG']['CONFIG_PROFILE']; ?>
</div>

<?php if ($this->_tpl_vars['messages'] && ( $this->_tpl_vars['opt'] == 'save' || $this->_tpl_vars['opt'] == 'changepass' )): ?>
    <div class="sess_messages">
        <?php $_from = $this->_tpl_vars['messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['message']):
?>
            <?php echo $this->_tpl_vars['message']; ?>

        <?php endforeach; endif; unset($_from); ?>
    </div>
<?php endif; ?>

<form id="editform" name="editform" method="post" action="">
    <input type="hidden" name="opt" value="save" />

    <div id="profiletabs">
        <ul id="tabs">
            <li><a href="#about"><span><?php echo $this->_tpl_vars['LANG']['ABOUT_ME']; ?>
</span></a></li>
            <li><a href="#contacts"><span><?php echo $this->_tpl_vars['LANG']['CONTACTS']; ?>
</span></a></li>
            <li><a href="#notices"><span><?php echo $this->_tpl_vars['LANG']['NOTIFIC']; ?>
</span></a></li>
            <li><a href="#policy"><span><?php echo $this->_tpl_vars['LANG']['PRIVACY']; ?>
</span></a></li>
        </ul>

            <div id="about">
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <td width="300" valign="top">
                            <strong><?php echo $this->_tpl_vars['LANG']['YOUR_NAME']; ?>
: </strong><br />
                            <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['YOUR_NAME_TEXT']; ?>
</span>
                        </td>
                        <td valign="top"><input name="nickname" type="text" class="text-input" id="nickname" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/></td>
                    </tr>
                    <tr>
                        <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['SEX']; ?>
:</strong></td>
                        <td valign="top">
                            <select name="gender" id="gender" style="width:307px">
                                <option value="0" <?php if ($this->_tpl_vars['usr']['gender'] == 0): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['NOT_SPECIFIED']; ?>
</option>
                                <option value="m" <?php if ($this->_tpl_vars['usr']['gender'] == 'm'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['MALES']; ?>
</option>
                                <option value="f" <?php if ($this->_tpl_vars['usr']['gender'] == 'f'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['FEMALES']; ?>
</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <strong><?php echo $this->_tpl_vars['LANG']['CITY']; ?>
:</strong><br />
                            <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['CITY_TEXT']; ?>
</span>
                        </td>
                        <td valign="top">
                            <input name="city" type="text" id="city" class="text-input" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['city'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/>
                            <script type="text/javascript">
                                <?php echo $this->_tpl_vars['autocomplete_js']; ?>

                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['BIRTH']; ?>
:</strong> </td>
                        <td valign="top">
                            <?php echo $this->_tpl_vars['dateform']; ?>

                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <strong><?php echo $this->_tpl_vars['LANG']['HOBBY']; ?>
 (<?php echo $this->_tpl_vars['LANG']['TAGSS']; ?>
): </strong><br/>
                            <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['YOUR_KEYWORDS']; ?>
</span><br />
                            <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['TAGSS_TEXT']; ?>
</span>
                        </td>
                        <td valign="top">
                            <textarea name="description" class="text-input" style="width:300px" rows="2" id="description"><?php echo $this->_tpl_vars['usr']['description']; ?>
</textarea>
                        </td>
                    </tr>
                    <?php if ($this->_tpl_vars['cfg_forum']['component_enabled']): ?>
                    <tr>
                        <td valign="top">
                            <strong><?php echo $this->_tpl_vars['LANG']['SIGNED_FORUM']; ?>
:</strong><br />
                            <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['CAN_USE_BBCODE']; ?>
 </span>
                        </td>
                        <td valign="top">
                            <textarea name="signature" class="text-input" style="width:300px" rows="2" id="signature"><?php echo $this->_tpl_vars['usr']['signature']; ?>
</textarea>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
                <p>	<?php echo $this->_tpl_vars['private_forms']; ?>
 </p>
            </div>

            <div id="contacts">
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <td width="300" valign="top">
                            <strong>E-mail:</strong><br />
                            <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['REALY_ADRESS_EMAIL']; ?>
</span>
                        </td>
                        <td valign="top">
                            <input name="email" type="text" class="text-input" id="email" style="width:300px" value="<?php echo $this->_tpl_vars['usr']['email']; ?>
"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['NUMBER_ICQ']; ?>
 :</strong></td>
                        <td valign="top"><input name="icq" class="text-input" type="text" id="icq" style="width:300px" value="<?php echo $this->_tpl_vars['usr']['icq']; ?>
"/></td>
                    </tr>
                </table>
            </div>

            <div id="notices">
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <td width="300" valign="top">
                            <strong>
                                <?php echo $this->_tpl_vars['LANG']['NOTIFY_NEW_MESS']; ?>
:
                            </strong><br/>
                            <span class="usr_edithint">
                                <?php echo $this->_tpl_vars['LANG']['NOTIFY_NEW_MESS_TEXT']; ?>

                            </span>
                        </td>
                        <td valign="top">
                            <input name="email_newmsg" type="radio" value="1" <?php if ($this->_tpl_vars['usr']['email_newmsg']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['YES']; ?>

                            <input name="email_newmsg" type="radio" value="0" <?php if (! $this->_tpl_vars['usr']['email_newmsg']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['NO']; ?>

                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <strong><?php echo $this->_tpl_vars['LANG']['HOW_NOTIFY_NEW_MESS']; ?>
 </strong><br />
                            <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['WHERE_TO_SEND']; ?>
</span>
                        </td>
                        <td valign="top">
                            <select name="cm_subscribe" id="cm_subscribe" style="width:307px">
                                <option value="mail" <?php if ($this->_tpl_vars['usr']['cm_subscribe'] == 'mail'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_EMAIL']; ?>
</option>
                                <option value="priv" <?php if ($this->_tpl_vars['usr']['cm_subscribe'] == 'priv'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_PRIVATE_MESS']; ?>
</option>
                                <option value="both" <?php if ($this->_tpl_vars['usr']['cm_subscribe'] == 'both'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_EMAIL_PRIVATE_MESS']; ?>
</option>
                                <option value="none" <?php if ($this->_tpl_vars['usr']['cm_subscribe'] == 'none'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['NOT_SEND']; ?>
</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="policy">
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <td width="300" valign="top">
                            <strong><?php echo $this->_tpl_vars['LANG']['SHOW_EMAIL']; ?>
:</strong><br/>
                            <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['SHOW_EMAIL_TEXT']; ?>
</span>
                        </td>
                        <td valign="top">
                            <input name="showmail" type="radio" value="1" <?php if ($this->_tpl_vars['usr']['showmail']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['YES']; ?>

                            <input name="showmail" type="radio" value="0" <?php if (! $this->_tpl_vars['usr']['showmail']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['NO']; ?>

                        </td>
                    </tr>
                    <tr>
                        <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['SHOW_ICQ']; ?>
:</strong></td>
                        <td valign="top">
                            <input name="showicq" type="radio" value="1" <?php if ($this->_tpl_vars['usr']['showicq']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['YES']; ?>

                            <input name="showicq" type="radio" value="0" <?php if (! $this->_tpl_vars['usr']['showicq']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['NO']; ?>

                        </td>
                    </tr>
                    <tr>
                        <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['SHOW_BIRTH']; ?>
:</strong> </td>
                        <td valign="top">
                            <input name="showbirth" type="radio" value="1" <?php if ($this->_tpl_vars['usr']['showbirth']): ?>checked<?php endif; ?>/><?php echo $this->_tpl_vars['LANG']['YES']; ?>

                            <input name="showbirth" type="radio" value="0" <?php if (! $this->_tpl_vars['usr']['showbirth']): ?>checked<?php endif; ?>/><?php echo $this->_tpl_vars['LANG']['NO']; ?>

                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <strong><?php echo $this->_tpl_vars['LANG']['SHOW_PROFILE']; ?>
:</strong><br/>
                            <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['WHOM_SHOW_PROFILE']; ?>
 </span>
                        </td>
                        <td valign="top">
                            <select name="allow_who" id="allow_who" style="width:307px">
                                <option value="all" <?php if ($this->_tpl_vars['usr']['allow_who'] == 'all'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['EVERYBODY']; ?>
</option>
                                <option value="registered" <?php if ($this->_tpl_vars['usr']['allow_who'] == 'registered'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['REGISTERED']; ?>
</option>
                                <option value="friends" <?php if ($this->_tpl_vars['usr']['allow_who'] == 'friends'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['MY_FRIENDS']; ?>
</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
</div>
	<div style="padding:5px; padding-bottom:15px; margin-bottom:5px;">
		<input style="font-size:16px" name="save" type="submit" id="save" value="<?php echo $this->_tpl_vars['LANG']['SAVE']; ?>
" />
        <input style="font-size:16px" name="chpassbtn" type="button" id="chpassbtn" value="<?php echo $this->_tpl_vars['LANG']['CHANGE_PASS']; ?>
" onclick="<?php echo '$(\'div#change_password\').slideToggle();'; ?>
" />
		<input style="font-size:16px" name="delbtn2" type="button" id="delbtn2" value="<?php echo $this->_tpl_vars['LANG']['DEL_PROFILE']; ?>
" onclick="location.href='/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/delprofile.html';" />
	</div>
</form>

<div id="change_password" style="display:none">
    <div class="con_heading"><?php echo $this->_tpl_vars['LANG']['CHANGING_PASS']; ?>
</div>
    <?php if ($this->_tpl_vars['emsg'] && $this->_tpl_vars['opt'] == 'changepass'): ?>
        <div style="color:red"><?php echo $this->_tpl_vars['emsg']; ?>
</div>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['msg'] && $this->_tpl_vars['opt'] == 'changepass'): ?>
        <div style="color:green"><?php echo $this->_tpl_vars['msg']; ?>
</div>
    <?php endif; ?>
    <form id="editform" name="editform" method="post" action="">
        <input type="hidden" name="opt" value="changepass" />
            <table width="100%" border="0" cellspacing="0" cellpadding="5" style="margin:11px">
                <tr>
                    <td width="300" valign="top"><strong><?php echo $this->_tpl_vars['LANG']['OLD_PASS']; ?>
: </strong></td>
                    <td valign="top"><input name="oldpass" type="password" id="oldpass" size="30" /></td>
                </tr>
                <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['NEW_PASS']; ?>
:</strong></td>
                    <td valign="top"><input name="newpass" type="password" id="newpass" size="30" /></td>
                </tr>
                <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['NEW_PASS_REPEAT']; ?>
</strong>:</td>
                    <td valign="top"><input name="newpass2" type="password" id="newpass2" size="30" /></td>
                </tr>
            </table>
        <div style="padding:5px; padding-bottom:15px; margin-bottom:20px;">
            <input style="font-size:16px" name="save2" type="submit" id="save2" value="<?php echo $this->_tpl_vars['LANG']['CHANGE_PASSWORD']; ?>
" />
        </div>
    </form>
</div>