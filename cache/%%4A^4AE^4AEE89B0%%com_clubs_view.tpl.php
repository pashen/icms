<?php /* Smarty version 2.6.19, created on 2012-10-17 13:21:43
         compiled from com_clubs_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_clubs_view.tpl', 18, false),array('modifier', 'spellcount', 'com_clubs_view.tpl', 32, false),)), $this); ?>

<?php if ($this->_tpl_vars['can_create']): ?>
	<div class="new_club">
		<?php echo $this->_tpl_vars['LANG']['YOU_CAN']; ?>
 <a href="/clubs/create.html"><?php echo $this->_tpl_vars['LANG']['TO_CREATE_NEW_CLUB']; ?>
</a>
	</div>
<?php endif; ?>

<div class="con_heading"><?php echo $this->_tpl_vars['pagetitle']; ?>
</div>

<?php if ($this->_tpl_vars['total'] > 0): ?>

	<?php $_from = $this->_tpl_vars['clubs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['club']):
?>
		<div class="club_entry<?php if ($this->_tpl_vars['club']['is_vip']): ?>_vip<?php endif; ?>">
			<div class="image">
				<a href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['club']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="<?php echo $this->_tpl_vars['club']['clubtype']; ?>
">
					<img src="/images/clubs/small/<?php echo $this->_tpl_vars['club']['imageurl']; ?>
" border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['club']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/>
				</a>
			</div>					
			<div class="data">
				<div class="title">
					<a href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
" class="<?php echo $this->_tpl_vars['club']['clubtype']; ?>
" <?php if ($this->_tpl_vars['club']['clubtype'] == 'private'): ?>title="Приватный клуб"<?php endif; ?>><?php echo $this->_tpl_vars['club']['title']; ?>
</a>
				</div>
				<div class="details">
                    <?php if ($this->_tpl_vars['club']['is_vip']): ?>
                        <span class="vip"><strong><?php echo $this->_tpl_vars['LANG']['VIP_CLUB']; ?>
</strong></span>
                    <?php else: ?>
    					<span class="rating"><strong><?php echo $this->_tpl_vars['LANG']['RATING']; ?>
</strong> &mdash; <?php echo $this->_tpl_vars['club']['rating']; ?>
</span>
                    <?php endif; ?>
					<span class="members"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['club']['members'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['USER'], $this->_tpl_vars['LANG']['USER2'], $this->_tpl_vars['LANG']['USER10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['USER'], $this->_tpl_vars['LANG']['USER2'], $this->_tpl_vars['LANG']['USER10'])); ?>
</strong></span>
				</div>
			</div>
		</div>
	<?php endforeach; endif; unset($_from); ?>
	
	<?php if ($this->_tpl_vars['pagination']): ?><div style="margin-top:40px"><?php echo $this->_tpl_vars['pagination']; ?>
</div><?php endif; ?>
<?php else: ?>
	<p style="clear:both"><?php echo $this->_tpl_vars['LANG']['NOT_ACTIVE_CLUBS']; ?>
</p>
<?php endif; ?>