<?php /* Smarty version 2.6.19, created on 2012-10-17 13:09:08
         compiled from mod_usermenu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'profile_url', 'mod_usermenu.tpl', 4, false),)), $this); ?>
<div class="mod_user_menu">

    <span class="my_profile">
        <a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['login']), $this);?>
"><?php echo $this->_tpl_vars['nickname']; ?>
</a>
    </span>

    <?php if ($this->_tpl_vars['is_billing']): ?>
        <span class="my_balance">
            <a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['login']), $this);?>
#upr_p_balance" title="Баланс"><?php if ($this->_tpl_vars['balance']): ?><?php echo $this->_tpl_vars['balance']; ?>
<?php else: ?>0<?php endif; ?></a>
        </span>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['users_cfg']['sw_msg']): ?>
    <span class="my_messages">
        <?php if ($this->_tpl_vars['newmsg']): ?>
            <a class="has_new" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages.html"><?php echo $this->_tpl_vars['LANG']['USERMENU_MESS']; ?>
 (<?php echo $this->_tpl_vars['newmsg']; ?>
)</a>
        <?php else: ?>
            <a href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages.html"><?php echo $this->_tpl_vars['LANG']['USERMENU_MESS']; ?>
</a>
        <?php endif; ?>
    </span>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['users_cfg']['sw_blogs']): ?>
    <span class="my_blog">
        <a href="<?php echo $this->_tpl_vars['blog_href']; ?>
"><?php echo $this->_tpl_vars['LANG']['USERMENU_MY_BLOG']; ?>
</a>
    </span>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['users_cfg']['sw_photo']): ?>
    <span class="my_photos">
        <a href="/users/<?php echo $this->_tpl_vars['id']; ?>
/photoalbum.html"><?php echo $this->_tpl_vars['LANG']['USERMENU_PHOTOS']; ?>
</a>
    </span>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['is_can_add'] && ! $this->_tpl_vars['is_admin'] && ! $this->_tpl_vars['is_editor']): ?>
    <span class="my_content">
        <a href="/content/my.html"><?php echo $this->_tpl_vars['LANG']['USERMENU_ARTICLES']; ?>
</a>
    </span>

    <span class="add_content">
        <a href="/content/add.html"><?php echo $this->_tpl_vars['LANG']['USERMENU_ADD_ARTICLE']; ?>
</a>
    </span>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor']): ?>
    <span class="admin">
        <a href="/admin" target="_blank"><?php echo $this->_tpl_vars['LANG']['USERMENU_ADMININTER']; ?>
</a>
    </span>
    <?php endif; ?>

    <span class="logout">
        <a href="/logout"><?php echo $this->_tpl_vars['LANG']['USERMENU_EXIT']; ?>
</a>
    </span>

</div>
