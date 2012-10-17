<?php /* Smarty version 2.6.19, created on 2012-10-17 13:03:39
         compiled from module.tpl */ ?>
<div class="<?php echo $this->_tpl_vars['mod']['css_prefix']; ?>
module">
    <?php if ($this->_tpl_vars['mod']['showtitle'] != 0): ?>
        <div class="<?php echo $this->_tpl_vars['mod']['css_prefix']; ?>
moduletitle">
            <?php echo $this->_tpl_vars['mod']['title']; ?>

            <?php if ($this->_tpl_vars['cfglink']): ?>
                <span class="fast_cfg_link">
                    <a href="javascript:moduleConfig(<?php echo $this->_tpl_vars['mod']['module_id']; ?>
)" title="Настроить модуль">
                        <img src="/templates/_default_/images/icons/settings.png"/>
                    </a>
                </span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="<?php echo $this->_tpl_vars['mod']['css_prefix']; ?>
modulebody"><?php echo $this->_tpl_vars['mod']['body']; ?>
</div>

</div>