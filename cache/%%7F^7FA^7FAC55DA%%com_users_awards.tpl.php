<?php /* Smarty version 2.6.19, created on 2012-10-15 10:32:44
         compiled from com_users_awards.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_users_awards.tpl', 26, false),)), $this); ?>
	<?php $_from = $this->_tpl_vars['aws']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['aw']):
?>
        <div class="usr_award_block">
          <table style="width:100%; margin-bottom:2px;" cellspacing="2">
            <tr>
              <td class="usr_com_title"><strong><?php echo $this->_tpl_vars['aw']['title']; ?>
</strong> 
              <?php if ($this->_tpl_vars['aw']['award_id'] > 0): ?>
              	<td width="20" class="usr_awlist_link"><a href="/users/awardslist.html">?</a></td>
              <?php else: ?>
              <?php if ($this->_tpl_vars['is_admin']): ?>
              	[<a href="/users/delaward<?php echo $this->_tpl_vars['aw']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a>]
              <?php endif; ?>
              </td>
              <?php endif; ?>
            </tr>
            <tr>
            <?php if ($this->_tpl_vars['aw']['award_id'] > 0): ?>
              <td class="usr_com_body" colspan="2">
            <?php else: ?>
              <td class="usr_com_body">
            <?php endif; ?>
                <table border="0" cellpadding="5" cellspacing="0">
                  <tr>
                    <td valign="top"><img src="/images/users/awards/<?php echo $this->_tpl_vars['aw']['imageurl']; ?>
" border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['aw']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/></td>
                    <td valign="top"><?php echo $this->_tpl_vars['aw']['description']; ?>

                      <div class="usr_award_date"><?php echo $this->_tpl_vars['aw']['pubdate']; ?>
</div></td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
<?php endforeach; endif; unset($_from); ?>