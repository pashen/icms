<?php /* Smarty version 2.6.19, created on 2012-10-17 13:21:29
         compiled from com_board_items.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_board_items.tpl', 19, false),array('modifier', 'truncate', 'com_board_items.tpl', 34, false),array('function', 'profile_url', 'com_board_items.tpl', 50, false),array('function', 'math', 'com_board_items.tpl', 63, false),)), $this); ?>
<?php if ($this->_tpl_vars['page_title']): ?><h1 class="con_heading"><?php echo $this->_tpl_vars['page_title']; ?>
</h1><?php endif; ?>
<?php if ($this->_tpl_vars['order_form']): ?><?php echo $this->_tpl_vars['order_form']; ?>
<?php endif; ?>
<div class="board_gallery">
	<?php if ($this->_tpl_vars['items']): ?>
		<table width="100%" cellpadding="3" cellspacing="0" border="0">
			<?php $this->assign('col', '1'); ?>
            <?php $this->assign('is_moder', '0'); ?>
			<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['con']):
?>									
				<?php if ($this->_tpl_vars['col'] == 1): ?> <tr> <?php endif; ?> 				
				<td valign="top" width="<?php echo $this->_tpl_vars['colwidth']; ?>
%">
                    <div class="bd_item<?php if ($this->_tpl_vars['con']['is_vip']): ?>_vip<?php endif; ?>">
					<table width="100%" height="" cellspacing="" cellpadding="0" class="b_table_tr">
						<tr>
							<?php if ($this->_tpl_vars['cfg']['photos']): ?>
								<td width="30" valign="top">
									<img class="bd_image_small" src="/images/board/small/<?php echo $this->_tpl_vars['con']['file']; ?>
" border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['con']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/>
								</td>
							<?php endif; ?>
							<td valign="top">
                                <?php if ($this->_tpl_vars['con']['moderator']): ?>
                                <?php $this->assign('is_moder', '1'); ?>
                                <div class="bd_moderate_link">
                                    <span class="bd_item_edit"><a href="/board/edit<?php echo $this->_tpl_vars['con']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a></span>
                                    <span class="bd_item_delete"><a href="/board/delete<?php echo $this->_tpl_vars['con']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a></span>
                                </div>
                                <?php endif; ?>
								<div class="bd_title">
									<a href="/board/read<?php echo $this->_tpl_vars['con']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['con']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><?php echo $this->_tpl_vars['con']['title']; ?>
</a>
								</div>
								<div class="bd_text">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['con']['content'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 250) : smarty_modifier_truncate($_tmp, 250)); ?>

								</div>																													
								<div class="bd_item_details">
                                		<?php if ($this->_tpl_vars['cat']['showdate'] && $this->_tpl_vars['con']['published']): ?>
											<span class="bd_item_date"><?php echo $this->_tpl_vars['con']['fpubdate']; ?>
</span>
                                        <?php endif; ?>
                                        <?php if (! $this->_tpl_vars['con']['published'] && $this->_tpl_vars['con']['is_overdue']): ?>
                                            <span class="bd_item_status_bad"><?php echo $this->_tpl_vars['LANG']['ADV_EXTEND_INFO']; ?>
</span>
                                        <?php elseif (! $this->_tpl_vars['con']['published']): ?>
                                            <span class="bd_item_status_bad"><?php echo $this->_tpl_vars['LANG']['WAIT_MODER']; ?>
</span>
                                        <?php endif; ?>
                                        <span class="bd_item_hits"><?php echo $this->_tpl_vars['con']['hits']; ?>
</span>
										<?php if ($this->_tpl_vars['con']['city']): ?>
											<span class="bd_item_city"><a href="/board/city/<?php echo ((is_array($_tmp=$this->_tpl_vars['con']['enc_city'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><?php echo $this->_tpl_vars['con']['city']; ?>
</a></span>
										<?php endif; ?>
										<?php if ($this->_tpl_vars['con']['nickname']): ?>
											<span class="bd_item_user"><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['con']['login']), $this);?>
"><?php echo $this->_tpl_vars['con']['nickname']; ?>
</a></span>
                                        <?php else: ?>
                                        	<span class="bd_item_user"><?php echo $this->_tpl_vars['LANG']['BOARD_GUEST']; ?>
</span>
										<?php endif; ?>
                                        <?php if ($this->_tpl_vars['con']['cat_title']): ?>
                                        	<span class="bd_item_cat"><a href="/board/<?php echo $this->_tpl_vars['con']['category_id']; ?>
"><?php echo $this->_tpl_vars['con']['cat_title']; ?>
</a></span>
                                        <?php endif; ?>
								</div>										
							</td>
						</tr>
					</table>
                    </div>
				</td> 
				<?php if ($this->_tpl_vars['col'] == $this->_tpl_vars['maxcols']): ?> </tr> <?php $this->assign('col', '1'); ?> <?php else: ?> <?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['col'],'assign' => 'col'), $this);?>
 <?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<?php if ($this->_tpl_vars['col'] > 1): ?> 
				<td colspan="<?php echo smarty_function_math(array('equation' => "x - y + 1",'x' => $this->_tpl_vars['col'],'y' => $this->_tpl_vars['maxcols']), $this);?>
">&nbsp;</td></tr>
			<?php endif; ?>
		</table>
		<?php echo $this->_tpl_vars['pagebar']; ?>

	<?php elseif ($this->_tpl_vars['cat']['id'] != $this->_tpl_vars['root_id']): ?>
		<p><?php echo $this->_tpl_vars['LANG']['ADVS_NOT_FOUND']; ?>
</p>
	<?php endif; ?>
</div>
<?php if ($this->_tpl_vars['is_moder']): ?>
<?php echo '
<script type="text/javascript" language="JavaScript">
	$(document).ready(function(){
		$(\'.b_table_tr .bd_moderate_link\').css({opacity:0.3, filter:\'alpha(opacity=30)\'});
		$(\'.b_table_tr\').hover(
			function() {
				$(this).find(\'.bd_moderate_link\').css({opacity:1.0, filter:\'alpha(opacity=100)\'});
			},
			function() {
				$(this).find(\'.bd_moderate_link\').css({opacity:0.3, filter:\'alpha(opacity=30)\'});
			}
		);
	});
</script>
'; ?>

<?php endif; ?>