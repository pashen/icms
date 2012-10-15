<?php /* Smarty version 2.6.19, created on 2012-10-15 10:31:57
         compiled from mod_comments.tpl */ ?>
<?php if ($this->_tpl_vars['is_com']): ?>
            <?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aid'] => $this->_tpl_vars['comment']):
?>
                <div class="mod_com_line">
                        <a class="mod_com_link" href="<?php echo $this->_tpl_vars['comment']['link']; ?>
"><?php echo $this->_tpl_vars['comment']['text']; ?>
</a> <?php if ($this->_tpl_vars['cfg']['showtarg']): ?> <strong>(<?php echo $this->_tpl_vars['comment']['rating']; ?>
)</strong><?php endif; ?>
                </div>
                <div class="mod_com_details">
                    <a class="mod_com_userlink" href="<?php echo $this->_tpl_vars['comment']['user_url']; ?>
"><?php echo $this->_tpl_vars['comment']['author']; ?>
</a> <?php echo $this->_tpl_vars['comment']['fpubdate']; ?>
<br/><a class="mod_com_targetlink" href="<?php echo $this->_tpl_vars['comment']['target_link']; ?>
"><?php echo $this->_tpl_vars['comment']['target_title']; ?>
</a>
                </div>
            <?php endforeach; endif; unset($_from); ?>
            <?php if ($this->_tpl_vars['cfg']['showrss']): ?>
                <div style="margin-top:15px">
                    <a href="/rss/comments/all/feed.rss" class="mod_latest_rss"><?php echo $this->_tpl_vars['LANG']['COMMENTS_RSS']; ?>
</a>
                </div>
            <?php endif; ?>
            <div style="margin-top:5px">
                <a href="/comments" class="mod_com_all"><?php echo $this->_tpl_vars['LANG']['COMMENTS_ALL']; ?>
</a>
            </div>
<?php else: ?>            
<p><?php echo $this->_tpl_vars['LANG']['COMMENTS_NOT_COMM']; ?>
</p>
<?php endif; ?>