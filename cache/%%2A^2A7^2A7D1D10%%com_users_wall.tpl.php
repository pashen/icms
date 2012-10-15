<?php /* Smarty version 2.6.19, created on 2012-10-15 10:32:44
         compiled from com_users_wall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'profile_url', 'com_users_wall.tpl', 12, false),)), $this); ?>

<?php if ($this->_tpl_vars['total']): ?>

    <input type="hidden" name="user_id" value="<?php echo $this->_tpl_vars['wall_user_id']; ?>
" />
    <input type="hidden" name="usertype" value="<?php echo $this->_tpl_vars['usertype']; ?>
" />

    <?php $_from = $this->_tpl_vars['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['record']):
?>
        <div class="usr_wall_entry">
            <div class="usr_wall_title"><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['record']['author_login']), $this);?>
"><?php echo $this->_tpl_vars['record']['author']; ?>
</a>, <?php echo $this->_tpl_vars['record']['fpubdate']; ?>
<?php if ($this->_tpl_vars['record']['is_today']): ?> <?php echo $this->_tpl_vars['LANG']['BACK']; ?>
<?php endif; ?>:</div>
            <?php if ($this->_tpl_vars['myprofile'] || $this->_tpl_vars['record']['author_id'] == $this->_tpl_vars['user_id']): ?>
                <div class="usr_wall_delete"><a href="/users/wall-delete/<?php echo $this->_tpl_vars['usertype']; ?>
/<?php echo $this->_tpl_vars['record']['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a></div>
            <?php endif; ?>

            <table style="width:100%; margin-bottom:2px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="70" valign="top" align="center" style="text-align:center">
                    <div class="usr_wall_avatar">
                        <a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['record']['author_login']), $this);?>
"><?php echo $this->_tpl_vars['record']['avatar']; ?>
</a>
                    </div>
                </td>
                <td width="" valign="top" class="usr_wall_text"><?php echo $this->_tpl_vars['record']['content']; ?>
</td>
            </tr>
            </table>
        </div>
    <?php endforeach; endif; unset($_from); ?>

    <div class="wall_loading" style="display:none;color:gray;margin:15px">
        <span style="background:url(/images/ajax-loader.gif) no-repeat left center;padding-left:60px"><em><?php echo $this->_tpl_vars['LANG']['MESS_LOADING']; ?>
...</em></span>
    </div>

    <?php if ($this->_tpl_vars['pages'] > 1): ?>
        <div>
            <?php echo $this->_tpl_vars['pagebar']; ?>

        </div>
    <?php endif; ?>

<?php else: ?>
    <p><?php echo $this->_tpl_vars['LANG']['NOT_POSTS_ON_WALL_TEXT']; ?>
</p>
<?php endif; ?>