<?php /* Smarty version 2.6.19, created on 2012-10-15 10:31:56
         compiled from mod_latestblogs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'spellcount', 'mod_latestblogs.tpl', 13, false),)), $this); ?>
<?php if ($this->_tpl_vars['is_blog']): ?>
    
    <?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['post']):
?>
        <div class="mod_latest_entry">

            <div class="mod_latest_image">
                <?php echo $this->_tpl_vars['post']['image']; ?>

            </div>

            <a class="mod_latest_blog_title" href="<?php echo $this->_tpl_vars['post']['href']; ?>
"><?php echo $this->_tpl_vars['post']['title']; ?>
</a>

            <div class="mod_latest_date">
                <?php echo $this->_tpl_vars['post']['fpubdate']; ?>
 - <a href="<?php echo $this->_tpl_vars['post']['bloghref']; ?>
"><?php echo $this->_tpl_vars['post']['blog']; ?>
</a><?php if ($this->_tpl_vars['cfg']['showcom']): ?> - <a href="<?php echo $this->_tpl_vars['post']['href']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['post']['comments'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['COMMENT1'], $this->_tpl_vars['LANG']['COMMENT2'], $this->_tpl_vars['LANG']['COMMENT10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['COMMENT1'], $this->_tpl_vars['LANG']['COMMENT2'], $this->_tpl_vars['LANG']['COMMENT10'])); ?>
" class="mod_latest_comments"><?php echo $this->_tpl_vars['post']['comments']; ?>
</a><?php endif; ?>
            </div>

        </div>
    <?php endforeach; endif; unset($_from); ?>

    <?php if ($this->_tpl_vars['cfg']['showrss']): ?>
        <div class="mod_latest_rss">
            <a href="/rss/blogs/all/feed.rss"><?php echo $this->_tpl_vars['LANG']['LATESTBLOGS_RSS']; ?>
</a>
        </div>
    <?php endif; ?>

<?php else: ?>            
    <p><?php echo $this->_tpl_vars['LANG']['LATESTBLOGS_NOT_POSTS']; ?>
</p>
<?php endif; ?>