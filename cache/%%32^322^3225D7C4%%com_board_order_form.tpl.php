<?php /* Smarty version 2.6.19, created on 2012-10-17 13:21:29
         compiled from com_board_order_form.tpl */ ?>

<form action="<?php echo $this->_tpl_vars['action_url']; ?>
" method="POST" id="obform">
	<div class="photo_sortform">
		<table cellspacing="2" cellpadding="2" >
			<tr>
				<td ><?php echo $this->_tpl_vars['LANG']['TYPE']; ?>
: </td>
				<td >
					<select name="obtype" id="obtype" onchange="$('form#obform').submit();">
						<option value="all" <?php if (( empty ( $this->_tpl_vars['btype'] ) )): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ALL_TYPE']; ?>
</option>
						<?php echo $this->_tpl_vars['btypes']; ?>

					</select>
				</td>
				<td ><?php echo $this->_tpl_vars['LANG']['CITY']; ?>
: </td>
				<td >
					<?php echo $this->_tpl_vars['bcities']; ?>

				</td>
				<td ><?php echo $this->_tpl_vars['LANG']['ORDER']; ?>
: </td>
				<td >
					<select name="orderby" id="orderby">
						<option value="title" <?php if ($this->_tpl_vars['orderby'] == 'title'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_TITLE']; ?>
</option>
						<option value="pubdate" <?php if ($this->_tpl_vars['orderby'] == 'pubdate'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_DATE']; ?>
</option>
						<option value="hits" <?php if ($this->_tpl_vars['orderby'] == 'hits'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_HITS']; ?>
</option>
						<option value="obtype" <?php if ($this->_tpl_vars['orderby'] == 'obtype'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_TYPE']; ?>
</option>
						<option value="user_id" <?php if ($this->_tpl_vars['orderby'] == 'user_id'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_AVTOR']; ?>
</option>
					</select>
					<select name="orderto" id="orderto">';
						<option value="desc" <?php if ($this->_tpl_vars['orderto'] == 'desc'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_DESC']; ?>
</option>
						<option value="asc" <?php if ($this->_tpl_vars['orderto'] == 'asc'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_ASC']; ?>
</option>
					</select>
					<input type="submit" value="<?php echo $this->_tpl_vars['LANG']['FILTER']; ?>
" />
				</td>		
			</tr>
		</table>
	</div>
</form>