<?php /* Smarty version 2.6.19, created on 2012-10-17 13:21:23
         compiled from com_users_view.tpl */ ?>

<div id="users_search_link" class="float_bar">
    <a href="javascript:void(0)" onclick="<?php echo '$(\'#users_sbar\').slideToggle();'; ?>
">
        <span><?php echo $this->_tpl_vars['LANG']['USERS_SEARCH']; ?>
</span>
    </a>
</div>

<h1 class="con_heading"><?php echo $this->_tpl_vars['LANG']['USERS']; ?>
</h1>

    <?php if ($this->_tpl_vars['cfg']['sw_search']): ?>    
    <div id="users_sbar" style="display:none;">
        <form name="usr_search_form" method="post" action="/users/search.html">
            <table cellpadding="2">
                <tr>
                    <td width="80"><?php echo $this->_tpl_vars['LANG']['FIND']; ?>
: </td>
                    <td width="170">
                        <select name="gender" id="gender" class="field" style="width:150px">
                            <option value="f"><?php echo $this->_tpl_vars['LANG']['FIND_FEMALE']; ?>
</option>
                            <option value="m"><?php echo $this->_tpl_vars['LANG']['FIND_MALE']; ?>
</option>
                            <option value="0" selected><?php echo $this->_tpl_vars['LANG']['FIND_ALL']; ?>
</option>
                        </select>
                    </td>
                     <td width="80"><?php echo $this->_tpl_vars['LANG']['AGE_FROM']; ?>
</td>
                     <td>
                        <input style="width:60px" name="agefrom" type="text" id="agefrom" value="18"/>
                        <?php echo $this->_tpl_vars['LANG']['TO']; ?>

                        <input style="width:60px" name="ageto" type="text" id="ageto" value=""/>
                     </td>
                </tr>
                <tr>
                </tr>
                <tr>
                     <td>
                         <?php echo $this->_tpl_vars['LANG']['NAME']; ?>

                     </td>
                     <td>
                        <input style="width:150px" id="name" name="name" class="field" type="text" value=""/>
                        <script type="text/javascript">
                            <?php echo $this->_tpl_vars['autocomplete_js']; ?>

                        </script>
                     </td>
                      <td>
                         <?php echo $this->_tpl_vars['LANG']['CITY']; ?>

                     </td>
                     <td>
                        <input style="width:150px" id="city" name="city" class="field" type="text" value=""/>
                        <script type="text/javascript">
                            <?php echo $this->_tpl_vars['autocomplete_js']; ?>

                        </script>
                     </td>
                </tr>
                <tr>
                </tr>
                <tr>
                     <td><?php echo $this->_tpl_vars['LANG']['HOBBY']; ?>
</td>
                     <td colspan="3">
                        <input style="" id="hobby" class="longfield" name="hobby" type="text" value=""/>
                     </td>
                </tr>
            </table>
            <p>
                <input name="gosearch" type="submit" id="gosearch" value="<?php echo $this->_tpl_vars['LANG']['SEARCH']; ?>
" />
                <input name="hide" type="button" id="hide" value="<?php echo $this->_tpl_vars['LANG']['HIDE']; ?>
" onclick="<?php echo '$(\'#users_sbar\').slideToggle();'; ?>
"/>
            </p>
        </form>
    </div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['querymsg']): ?>
        <div class="users_search_results"><?php echo $this->_tpl_vars['querymsg']; ?>
</div>
    <?php endif; ?>

	<table width="100%" cellspacing="0" cellpadding="0" class="users_layout">
		<tr>
			<td width="" valign="top">
							
				<div class="users_list_buttons">
					<div class="button <?php if ($this->_tpl_vars['link']['selected'] == 'latest'): ?>selected<?php endif; ?>"><a rel=”nofollow” href="<?php echo $this->_tpl_vars['link']['latest']; ?>
"><?php echo $this->_tpl_vars['LANG']['LATEST']; ?>
</a></div>
                    <div class="button <?php if ($this->_tpl_vars['link']['selected'] == 'positive'): ?>selected<?php endif; ?>"><a rel=”nofollow” href="<?php echo $this->_tpl_vars['link']['positive']; ?>
"><?php echo $this->_tpl_vars['LANG']['POSITIVE']; ?>
</a></div>
					<div class="button <?php if ($this->_tpl_vars['link']['selected'] == 'rating'): ?>selected<?php endif; ?>"><a rel=”nofollow” href="<?php echo $this->_tpl_vars['link']['rating']; ?>
"><?php echo $this->_tpl_vars['LANG']['RATING']; ?>
</a></div>					
				</div>
				<div class="users_list">
					<table width="100%" cellspacing="0" cellpadding="0" class="users_list">
						<?php if ($this->_tpl_vars['is_users']): ?>
							<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['usr']):
?>								
								<tr>
									<td width="80" valign="top">
										<div class="avatar"><?php echo $this->_tpl_vars['usr']['avatar']; ?>
</div>
									</td>
									<td valign="top">
                                        <?php if ($this->_tpl_vars['link']['selected'] == 'rating'): ?>
                                            <div class="rating" title="<?php echo $this->_tpl_vars['LANG']['RATING']; ?>
"><?php echo $this->_tpl_vars['usr']['rating']; ?>
</div>
                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['link']['selected'] == 'positive'): ?>
                                            <div title="<?php echo $this->_tpl_vars['LANG']['KARMA']; ?>
" class="karma<?php if ($this->_tpl_vars['usr']['karma'] > 0): ?> pos<?php endif; ?><?php if ($this->_tpl_vars['usr']['karma'] < 0): ?> neg<?php endif; ?>"><?php if ($this->_tpl_vars['usr']['karma'] > 0): ?>+<?php endif; ?><?php echo $this->_tpl_vars['usr']['karma']; ?>
</div>
                                        <?php endif; ?>
                                        <div class="status"><?php echo $this->_tpl_vars['usr']['status']; ?>
</div>
										<div class="nickname"><?php echo $this->_tpl_vars['usr']['nickname']; ?>
</div>
                                        <?php if ($this->_tpl_vars['usr']['microstatus']): ?>
                                            <div class="microstatus"><?php echo $this->_tpl_vars['usr']['microstatus']; ?>
</div>
                                        <?php endif; ?>
									</td>
                                </tr>
							<?php endforeach; endif; unset($_from); ?>		
						<?php else: ?>
							<tr>
								<td>
									<p><?php echo $this->_tpl_vars['LANG']['USERS_NOT_FOUND']; ?>
.</p>
								</td>
							</tr>
						<?php endif; ?>
					</table>					
				</div>
				<?php if (( isset ( $this->_tpl_vars['pagebar'] ) && ( $this->_tpl_vars['orderby'] != 'karma' || $this->_tpl_vars['orderto'] != 'asc' ) )): ?> <?php echo $this->_tpl_vars['pagebar']; ?>
	<?php endif; ?>
			</td>
		</tr>
	</table>		