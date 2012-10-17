<?php /* Smarty version 2.6.19, created on 2012-10-17 13:21:29
         compiled from com_board_cats.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'com_board_cats.tpl', 30, false),)), $this); ?>
<?php if ($this->_tpl_vars['cat']['is_can_add'] || $this->_tpl_vars['root_id'] == $this->_tpl_vars['cat']['id']): ?>
<div class="float_bar">
	<table cellpadding="2" cellspacing="0">
		<tr><td><img src="/components/board/images/add.gif" border="0"/></td>
		<td><a href="/board/<?php if ($this->_tpl_vars['root_id'] != $this->_tpl_vars['cat']['id']): ?><?php echo $this->_tpl_vars['cat']['id']; ?>
/<?php endif; ?>add.html"><?php echo $this->_tpl_vars['LANG']['ADD_ADV']; ?>
</a></td></tr>
	</table>
</div>
<?php endif; ?>

<h1 class="con_heading"><?php echo $this->_tpl_vars['pagetitle']; ?>
 <a href="/rss/board/<?php if ($this->_tpl_vars['root_id'] == $this->_tpl_vars['cat']['id']): ?>all<?php else: ?><?php echo $this->_tpl_vars['cat']['id']; ?>
<?php endif; ?>/feed.rss" title="<?php echo $this->_tpl_vars['LANG']['RSS']; ?>
"><img src="/images/markers/rssfeed.png" border="0" alt="<?php echo $this->_tpl_vars['LANG']['RSS']; ?>
"/></a></h1>

<?php if ($this->_tpl_vars['cats']): ?>
	<table class="board_categorylist" cellspacing="3" width="100%" border="0">
		<?php $this->assign('col', '1'); ?>	
		<?php $_from = $this->_tpl_vars['cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['cat']):
?>			
			<?php if ($this->_tpl_vars['col'] == 1): ?> <tr> <?php endif; ?>
				<td width="30" valign="top">
                    <img class="bd_cat_main_icon" src="/upload/board/cat_icons/<?php echo $this->_tpl_vars['cat']['icon']; ?>
" border="0" />
                </td>
				<td valign="top" class="bd_cat_cell">
					<div class="bd_cat_main_title"><a href="/board/<?php echo $this->_tpl_vars['cat']['id']; ?>
"><?php echo $this->_tpl_vars['cat']['title']; ?>
</a> (<?php echo $this->_tpl_vars['cat']['content_count']; ?>
)</div>					
					<?php if ($this->_tpl_vars['cat']['description']): ?> 
						<div class="bd_cat_main_desc"><?php echo $this->_tpl_vars['cat']['description']; ?>
</div>
					<?php endif; ?>					
					<div class="bd_cat_main_obtypes"><?php echo $this->_tpl_vars['cat']['ob_links']; ?>
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
<?php endif; ?>