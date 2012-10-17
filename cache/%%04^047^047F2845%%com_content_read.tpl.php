<?php /* Smarty version 2.6.19, created on 2012-10-17 13:04:58
         compiled from com_content_read.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'profile_url', 'com_content_read.tpl', 13, false),array('function', 'math', 'com_content_read.tpl', 29, false),array('modifier', 'spellcount', 'com_content_read.tpl', 83, false),)), $this); ?>

<?php if ($this->_tpl_vars['article']['showtitle']): ?>
    <h1 class="con_heading"><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
<?php endif; ?>

<?php if ($this->_tpl_vars['article']['showdate']): ?> 
	<div class="con_pubdate">
		<?php if (! $this->_tpl_vars['article']['published']): ?><span style="color:#CC0000"><?php echo $this->_tpl_vars['LANG']['NO_PUBLISHED']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['article']['pubdate']; ?>
<?php endif; ?> - <a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['article']['user_login']), $this);?>
"><?php echo $this->_tpl_vars['article']['author']; ?>
</a>
	</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['is_pages']): ?>
	<div class="con_pt" id="pt">	
		<span class="con_pt_heading">
			<a class="con_pt_hidelink" href="javascript:void;" onClick="<?php echo '$(\'#pt_list\').toggle();'; ?>
"><?php echo $this->_tpl_vars['LANG']['CONTENT']; ?>
</a>
			<?php if ($this->_tpl_vars['cfg']['pt_hide']): ?> [<a href="javascript:void(0);" onclick="<?php echo '$(\'#pt\').hide();'; ?>
"><?php echo $this->_tpl_vars['LANG']['HIDE']; ?>
</a>] <?php endif; ?>
		</span>		
		<div id="pt_list" style="<?php echo $this->_tpl_vars['pt_disp_style']; ?>
 width:100%">
			<div>
				<ul id="con_pt_list">
				<?php $_from = $this->_tpl_vars['pt_pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['page']):
?>
					<?php if (( $this->_tpl_vars['tid']+1 != $this->_tpl_vars['page'] )): ?>
						<?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['tid'],'assign' => 'key'), $this);?>

						<li><a href="<?php echo $this->_tpl_vars['page']['url']; ?>
"><?php echo $this->_tpl_vars['page']['title']; ?>
</a></li>
					<?php else: ?>
						<li><?php echo $this->_tpl_vars['page']['title']; ?>
</li>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<ul>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="con_text" style="overflow:hidden">
    <?php if ($this->_tpl_vars['article_image']): ?>
        <div class="con_image" style="float:left;margin-top:10px;margin-right:20px;margin-bottom:20px">
            <img src="/images/photos/medium/<?php echo $this->_tpl_vars['article_image']; ?>
" border="0" alt="<?php echo $this->_tpl_vars['article_image']; ?>
"/>
        </div>
    <?php endif; ?>
    <?php echo $this->_tpl_vars['article_content']; ?>

</div>

<?php if ($this->_tpl_vars['cfg']['af_showlink'] && $this->_tpl_vars['forum_thread_id']): ?>
    <div class="con_forum_link">
        <a href="/forum/thread<?php echo $this->_tpl_vars['forum_thread_id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['DISCUSS_ON_FORUM']; ?>
</a>
    </div>
<?php endif; ?>
<?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] || $this->_tpl_vars['is_author']): ?>
    <div class="blog_comments">
        <?php if (! $this->_tpl_vars['article']['published'] && ( $this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] )): ?>
        	<a class="blog_moderate_yes" href="/content/publish<?php echo $this->_tpl_vars['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['ARTICLE_ALLOW']; ?>
</a> | 
        <?php endif; ?>
        <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] || $this->_tpl_vars['is_author_del']): ?>
        	<a class="blog_moderate_no" href="/content/delete<?php echo $this->_tpl_vars['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a> | 
        <?php endif; ?>
        <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] || $this->_tpl_vars['is_author']): ?>
        	<a href="/content/edit<?php echo $this->_tpl_vars['id']; ?>
.html" class="blog_entry_edit"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if ($this->_tpl_vars['article']['showtags']): ?>
	<?php echo $this->_tpl_vars['tagbar']; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['cfg']['rating'] && $this->_tpl_vars['article']['canrate']): ?>
	<div id="con_rating_block">
		<div>
			<strong><?php echo $this->_tpl_vars['LANG']['RATING']; ?>
: </strong><span id="karmapoints"><?php echo $this->_tpl_vars['karma_points']; ?>
</span>
			<span style="padding-left:10px;color:#999"><strong>Голосов:</strong> <?php echo $this->_tpl_vars['karma_votes']; ?>
</span>
            <span style="padding-left:10px;color:#999"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['hits'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['HIT'], $this->_tpl_vars['LANG']['HIT2'], $this->_tpl_vars['LANG']['HIT10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['HIT'], $this->_tpl_vars['LANG']['HIT2'], $this->_tpl_vars['LANG']['HIT10'])); ?>
</span>
		</div>
		<?php if ($this->_tpl_vars['karma_buttons']): ?> 
			<div><strong><?php echo $this->_tpl_vars['LANG']['RAT_ARTICLE']; ?>
:</strong> <?php echo $this->_tpl_vars['karma_buttons']; ?>
</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

