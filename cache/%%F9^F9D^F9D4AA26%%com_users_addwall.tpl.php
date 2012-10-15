<?php /* Smarty version 2.6.19, created on 2012-10-15 10:32:44
         compiled from com_users_addwall.tpl */ ?>

<?php if ($this->_tpl_vars['my_id']): ?>
    <form action="/users/wall-add" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $this->_tpl_vars['user_id']; ?>
" />
        <input type="hidden" name="usertype" value="<?php echo $this->_tpl_vars['usertype']; ?>
" />

        <div class="usr_msg_bbcodebox"><?php echo $this->_tpl_vars['bb_toolbar']; ?>
</div>

        <div class="cm_smiles"><?php echo $this->_tpl_vars['smilies']; ?>
</div>

        <div style="margin-bottom:5px">
            <textarea name="message" id="message" class="wall_message"></textarea>
        </div>
        <div style="text-align:right">
            <input type="submit" value="<?php echo $this->_tpl_vars['LANG']['SEND']; ?>
" />
            <input name="Button" type="button" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
" onclick="<?php echo '$(\'#addwall\').slideToggle();$(\'.usr_wall_addlink\').toggle();'; ?>
"/>
        </div>
    </form>
<?php else: ?>
    <p><?php echo $this->_tpl_vars['LANG']['ONLY_REG_USER_CAN_WALL']; ?>
</p>
<?php endif; ?>