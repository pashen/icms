<?php /* Smarty version 2.6.19, created on 2012-10-17 13:03:40
         compiled from mod_latestboard.tpl */ ?>
<?php if ($this->_tpl_vars['items']): ?>
<ul class="new_board_items">
	<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['item']):
?>
		<li <?php if ($this->_tpl_vars['item']['is_vip']): ?>class="vip"<?php endif; ?>>
            <a href="/board/read<?php echo $this->_tpl_vars['item']['id']; ?>
.html"><?php echo $this->_tpl_vars['item']['title']; ?>
</a> &mdash; <?php echo $this->_tpl_vars['item']['fpubdate']; ?>
 <?php if ($this->_tpl_vars['cfg']['showcity']): ?>- <span class="board_city"><?php echo $this->_tpl_vars['item']['city']; ?>
</span><?php endif; ?>
		</li>
	<?php endforeach; endif; unset($_from); ?>
</ul>
<?php else: ?>
<p><?php echo $this->_tpl_vars['LANG']['LATESTBOARD_NOT_ADV']; ?>
</p>
<?php endif; ?>