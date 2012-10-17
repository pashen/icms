<?php /* Smarty version 2.6.19, created on 2012-10-17 13:21:47
         compiled from com_blog_view_posts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'spellcount', 'com_blog_view_posts.tpl', 64, false),)), $this); ?>

<div class="con_heading"><?php echo $this->_tpl_vars['pagetitle']; ?>
</div>

<?php if ($this->_tpl_vars['is_latest']): ?>
    <div class="blog_type_menu">

            <?php if (! $this->_tpl_vars['ownertype']): ?>
                <span class="blog_type_active"><?php echo $this->_tpl_vars['LANG']['POSTS_RSS']; ?>
</span>
            <?php else: ?>
                <a class="blog_type_link" href="/blogs"><?php echo $this->_tpl_vars['LANG']['POSTS_RSS']; ?>
</a>
            <?php endif; ?>

             <?php if ($this->_tpl_vars['ownertype'] == 'all'): ?>
                <span class="blog_type_active"><?php echo $this->_tpl_vars['LANG']['ALL_BLOGS']; ?>
</span>
             <?php else: ?>
                <a class="blog_type_link" href="/blogs/all.html"><?php echo $this->_tpl_vars['LANG']['ALL_BLOGS']; ?>
</a>
             <?php endif; ?>

            <?php if ($this->_tpl_vars['single_blogs'] && $this->_tpl_vars['multi_blogs']): ?>
                <?php if ($this->_tpl_vars['ownertype'] == 'single'): ?>
                    <span class="blog_type_active"><?php echo $this->_tpl_vars['LANG']['PERSONALS']; ?>
</span>
                <?php else: ?>
                    <a class="blog_type_link" href="/blogs/single.html"><?php echo $this->_tpl_vars['LANG']['PERSONALS']; ?>
</a>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['single_blogs'] && $this->_tpl_vars['multi_blogs']): ?>
                <?php if ($this->_tpl_vars['ownertype'] == 'multi' && $this->_tpl_vars['multi_blogs']): ?>
                    <span class="blog_type_active"><?php echo $this->_tpl_vars['LANG']['COLLECTIVES']; ?>
</span>
                <?php else: ?>
                    <a class="blog_type_link" href="/blogs/multi.html"><?php echo $this->_tpl_vars['LANG']['COLLECTIVES']; ?>
</a>
                <?php endif; ?>
            <?php endif; ?>

    </div>
<?php endif; ?>

<?php if ($this->_tpl_vars['is_posts'] == true): ?>
	<div class="blog_entries">
		<?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['post']):
?>
			<div class="blog_entry">
				<table width="100%" cellspacing="0" cellpadding="0" class="blog_records">
					<tr>
						<td width="" class="blog_entry_title_td">
							<div class="blog_entry_title">
                                <?php if ($this->_tpl_vars['post']['blog_url']): ?>
                                    <a href="<?php echo $this->_tpl_vars['post']['blog_url']; ?>
" style="color:gray"><?php echo $this->_tpl_vars['post']['blog_title']; ?>
</a> &rarr;
                                <?php endif; ?>
                                <a href="<?php echo $this->_tpl_vars['post']['url']; ?>
"><?php echo $this->_tpl_vars['post']['title']; ?>
</a>
                            </div>							
							<div class="blog_entry_info"><?php echo $this->_tpl_vars['post']['author']; ?>
 <span class="blog_entry_date"><?php echo $this->_tpl_vars['post']['fpubdate']; ?>
</span></div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="blog_entry_text"><?php echo $this->_tpl_vars['post']['msg']; ?>
</div>
							<div class="blog_comments">
                                <span class="post_karma"><?php echo $this->_tpl_vars['post']['karma']; ?>
</span>
								<?php if (( $this->_tpl_vars['post']['comments'] > 0 )): ?>
									<a class="blog_comments_link" href="<?php echo $this->_tpl_vars['post']['url']; ?>
#c"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']['comments'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['COMMENT'], $this->_tpl_vars['LANG']['COMMENT2'], $this->_tpl_vars['LANG']['COMMENT10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['COMMENT'], $this->_tpl_vars['LANG']['COMMENT2'], $this->_tpl_vars['LANG']['COMMENT10'])); ?>
</a>
								<?php else: ?>
									<a class="blog_comments_link" href="<?php echo $this->_tpl_vars['post']['url']; ?>
#c"><?php echo $this->_tpl_vars['LANG']['NOT_COMMENTS']; ?>
</a>
								<?php endif; ?>
							<?php if ($this->_tpl_vars['post']['tagline'] != false): ?>
								 <span class="tagline"><?php echo $this->_tpl_vars['post']['tagline']; ?>
</span>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['myblog'] || $this->_tpl_vars['post']['user_id'] == $this->_tpl_vars['uid'] || $this->_tpl_vars['is_admin']): ?>
								<span class="editlinks">
									| <a href="/blogs/<?php echo $this->_tpl_vars['post']['blog_id']; ?>
/editpost<?php echo $this->_tpl_vars['post']['id']; ?>
.html" class="blog_entry_edit"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a>
									| <a href="/blogs/<?php echo $this->_tpl_vars['post']['blog_id']; ?>
/delpost<?php echo $this->_tpl_vars['post']['id']; ?>
.html" class="blog_entry_delete"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a>
								</span>
							<?php endif; ?>
							</div>
						</td>
					</tr>
				</table>
			</div>
		<?php endforeach; endif; unset($_from); ?>		
	</div>	
	
	<?php echo $this->_tpl_vars['pagination']; ?>

<?php else: ?>
	<p style="clear:both"><?php echo $this->_tpl_vars['LANG']['NOT_POSTS']; ?>
</p>
<?php endif; ?>