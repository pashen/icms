<?php /* Smarty version 2.6.19, created on 2012-10-17 13:44:17
         compiled from com_comments_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_comments_add.tpl', 6, false),)), $this); ?>

<div class="cm_addentry">
	<form action="/comments/<?php echo ((is_array($_tmp=$this->_tpl_vars['do'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" id="msgform" method="POST">
        <input type="hidden" name="parent_id" value="<?php echo $this->_tpl_vars['parent_id']; ?>
" />
        <input type="hidden" name="comment_id" value="<?php echo $this->_tpl_vars['comment']['id']; ?>
" />
		<?php if ($this->_tpl_vars['no_guests'] && ! $this->_tpl_vars['is_user']): ?>
			<p><?php echo $this->_tpl_vars['LANG']['COMMENTS_CAN_ADD_ONLY']; ?>
 <a href="/registration" /><?php echo $this->_tpl_vars['LANG']['REGISTERED']; ?>
</a> <?php echo $this->_tpl_vars['LANG']['USERS']; ?>
.</p>
		<?php else: ?>
			<?php if ($this->_tpl_vars['user_can_add']): ?>
            
				<?php if ($this->_tpl_vars['can_by_karma'] || ! $this->_tpl_vars['cfg']['min_karma']): ?>

					<?php if (! $this->_tpl_vars['is_user']): ?>
						<div class="cm_guest_name"><label><?php echo $this->_tpl_vars['LANG']['YOUR_NAME']; ?>
: <input type="text" maxchars="20" size="30" name="guestname"/></label></div>
					<?php else: ?>
						<input type="hidden" name="user_id" value="<?php echo $this->_tpl_vars['is_user']; ?>
"/>
					<?php endif; ?>
	
					<input type="hidden" name="target" value="<?php echo $this->_tpl_vars['target']; ?>
"/>
					<input type="hidden" name="target_id" value="<?php echo $this->_tpl_vars['target_id']; ?>
"/>
	
                    <?php if ($this->_tpl_vars['cfg']['bbcode']): ?>
                        <div class="usr_msg_bbcodebox"><?php echo $this->_tpl_vars['bb_toolbar']; ?>
</div>
                    <?php endif; ?>

					<?php if ($this->_tpl_vars['cfg']['smiles'] && $this->_tpl_vars['smilies']): ?>
						<div class="cm_smiles"><?php if (! $this->_tpl_vars['cfg']['bbcode']): ?><a href="javascript:void(0);" onclick="$('#smilespanel').toggle()"><?php echo $this->_tpl_vars['LANG']['INSERT_SMILE']; ?>
</a> &darr;<?php endif; ?>
							<?php echo $this->_tpl_vars['smilies']; ?>

						</div>
					<?php endif; ?>
	
					<div class="cm_editor">
						<textarea id="content" name="content" class="ajax_autogrowarea"><?php echo $this->_tpl_vars['comment']['content_bbcode']; ?>
</textarea>
					</div>

					<?php if ($this->_tpl_vars['is_user'] && $this->_tpl_vars['do'] == 'add'): ?>
						<?php if (! $this->_tpl_vars['user_subscribed']): ?>
							<div style="margin-top:5px;margin-bottom:5px">
								<label style="padding:5px"><input name="subscribe" type="checkbox" value="1" /> <?php echo $this->_tpl_vars['LANG']['NOTIFY_NEW_COMM']; ?>
 [<a href="/users/<?php echo $this->_tpl_vars['is_user']; ?>
/editprofile.html#notices" target="_blank"><?php echo $this->_tpl_vars['LANG']['CONFIG_NOTIFY']; ?>
</a>]</label>
							</div>
						<?php endif; ?>
					<?php endif; ?>
			
					<div class="cm_codebar">
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<?php if ($this->_tpl_vars['need_captcha'] && $this->_tpl_vars['do'] == 'add'): ?>
									<td width=""><?php echo cmsPage::getCaptcha(); ?></td>
								<?php endif; ?>
								<td width="" align="right">
									<input class="cm_submit" type="submit" value="<?php echo $this->_tpl_vars['LANG']['SEND']; ?>
"/>
                                    <input class="cm_submit" type="button" onclick="cancelComment(<?php if ($this->_tpl_vars['do'] == 'add'): ?><?php echo $this->_tpl_vars['parent_id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['comment']['id']; ?>
<?php endif; ?>)" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
"/>
								</td>
							</tr>
						</table>
					</div>
					
				<?php else: ?>
					<p><?php echo $this->_tpl_vars['LANG']['YOU_NEED']; ?>
 <a href="/users/<?php echo $this->_tpl_vars['is_user']; ?>
/karma.html"><?php echo $this->_tpl_vars['LANG']['KARMS']; ?>
</a> <?php echo $this->_tpl_vars['LANG']['TO_ADD_COMM']; ?>
. <?php echo $this->_tpl_vars['LANG']['NEED']; ?>
 &mdash; <?php echo $this->_tpl_vars['karma_need']; ?>
, <?php echo $this->_tpl_vars['LANG']['HAS']; ?>
 &mdash; <?php echo $this->_tpl_vars['karma_has']; ?>
.</p>
				<?php endif; ?>

			<?php else: ?>
				<p><?php echo $this->_tpl_vars['LANG']['YOU_HAVENT_ACCESS_TEXT']; ?>
</p>
			<?php endif; ?>
		<?php endif; ?>
	</form>
</div>