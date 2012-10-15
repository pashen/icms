<?php /* Smarty version 2.6.19, created on 2012-10-15 10:32:16
         compiled from mod_bestblogs.tpl */ ?>
<table width="100%" cellspacing="0" cellpadding="5" border="0" >
<?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['post']):
?>
	<tr>
		<td class="mod_blog_karma" valign="top"><?php echo $this->_tpl_vars['post']['karma']; ?>
</td>
		<td valign="top">
			<div>
				<a class="mod_blog_userlink" href="<?php echo $this->_tpl_vars['post']['bloghref']; ?>
"><?php echo $this->_tpl_vars['post']['blog']; ?>
</a> &rarr; 
				<a class="mod_blog_link" href="<?php echo $this->_tpl_vars['post']['href']; ?>
"><?php echo $this->_tpl_vars['post']['title']; ?>
</a> (<?php echo $this->_tpl_vars['post']['date']; ?>
)
			</div>
		</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
</table>