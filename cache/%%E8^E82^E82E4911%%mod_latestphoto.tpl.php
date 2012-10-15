<?php /* Smarty version 2.6.19, created on 2012-10-15 10:32:14
         compiled from mod_latestphoto.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'mod_latestphoto.tpl', 10, false),array('modifier', 'truncate', 'mod_latestphoto.tpl', 10, false),array('function', 'math', 'mod_latestphoto.tpl', 44, false),)), $this); ?>
<?php if ($this->_tpl_vars['is_photo']): ?>
        <table cellspacing="2" border="0" width="100%">
              <?php $this->assign('col', '1'); ?>	
              <?php $_from = $this->_tpl_vars['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['con']):
?>
              <?php if ($this->_tpl_vars['col'] == 1): ?>
              <tr> <?php endif; ?>
                <td align="center" valign="middle" class="mod_lp_photo" width="">
				<table width="100%" height="100" cellspacing="0" cellpadding="0">
				<?php if ($this->_tpl_vars['cfg']['showtype'] == 'full'): ?>
					<tr><td align="center"><div class="mod_lp_titlelink"><a href="/photos/photo<?php echo $this->_tpl_vars['con']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['con']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['con']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 18) : smarty_modifier_truncate($_tmp, 18)); ?>
</a></div></td></tr>
				<?php endif; ?>
				<tr>
					  <td valign="middle" align="center">
						<a href="/photos/photo<?php echo $this->_tpl_vars['con']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['con']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
							<img class="photo_thumb_img" src="/images/photos/small/<?php echo $this->_tpl_vars['con']['file']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['con']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" border="0" />
						</a>
				</td></tr>
				<?php if ($this->_tpl_vars['cfg']['showtype'] == 'full'): ?>
					<tr>
					<td align="center">
						<?php if ($this->_tpl_vars['cfg']['showalbum']): ?>
							<div class="mod_lp_albumlink"><a href="/photos/<?php echo $this->_tpl_vars['con']['album_id']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['con']['album'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['con']['album'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 18) : smarty_modifier_truncate($_tmp, 18)); ?>
</a></div>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['cfg']['showcom'] || $this->_tpl_vars['cfg']['showdate']): ?>
							<div class="mod_lp_details">
							<table cellpadding="2" cellspacing="2" align="center" border="0"><tr>
								<?php if ($this->_tpl_vars['cfg']['showdate']): ?>
									<td><img src="/images/icons/date.gif" border="0"/></td>
									<td><?php echo $this->_tpl_vars['con']['fpubdate']; ?>
</td>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['cfg']['showcom']): ?>
									<td><img src="/images/icons/comments.gif" border="0"/></td>
									<td><a href="/photos/photo<?php echo $this->_tpl_vars['con']['id']; ?>
.html#c"><?php echo $this->_tpl_vars['con']['comments']; ?>
</a></td>
								<?php endif; ?>
							</tr></table>
							</div>
						<?php endif; ?>
					</td>
					</tr>
				<?php endif; ?>
				</table>
				
				</td> 
                <?php if ($this->_tpl_vars['col'] == $this->_tpl_vars['cfg']['maxcols']): ?> </tr> <?php $this->assign('col', '1'); ?> <?php else: ?> <?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['col'],'assign' => 'col'), $this);?>
 <?php endif; ?>
  			<?php endforeach; endif; unset($_from); ?>
			</table>
			<?php if ($this->_tpl_vars['cfg']['showmore']): ?>
				<div><a href="/photos/latest.html"><?php echo $this->_tpl_vars['LANG']['LATESTPHOTO_ALLNEW']; ?>
</a> &rarr;</div>
			<?php endif; ?>
<?php else: ?>
<p><?php echo $this->_tpl_vars['LANG']['LATESTPHOTO_NO_MATERIAL']; ?>
</p>
<?php endif; ?>