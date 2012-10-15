<?php /* Smarty version 2.6.19, created on 2012-10-15 10:32:22
         compiled from mod_user_stats.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'spellcount', 'mod_user_stats.tpl', 7, false),)), $this); ?>
<div id="mod_user_stats">
    <?php if ($this->_tpl_vars['cfg']['show_total']): ?>
    <div class="stat_block">
        <div class="title"><?php echo $this->_tpl_vars['LANG']['HOW_MUCH_US']; ?>
</div>
        <div class="body">
            <ul>
                <li><?php echo ((is_array($_tmp=$this->_tpl_vars['total_usr'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['USER'], $this->_tpl_vars['LANG']['USER2'], $this->_tpl_vars['LANG']['USER10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['USER'], $this->_tpl_vars['LANG']['USER2'], $this->_tpl_vars['LANG']['USER10'])); ?>
</li>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['cfg']['show_online']): ?>
    <div class="stat_block">
        <div class="title"> ÚÓ ÓÌÎ‡ÈÌ?</div>
        <div class="body">
            <ul>
                <li><?php echo ((is_array($_tmp=$this->_tpl_vars['people']['users'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['USER'], $this->_tpl_vars['LANG']['USER2'], $this->_tpl_vars['LANG']['USER10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['USER'], $this->_tpl_vars['LANG']['USER2'], $this->_tpl_vars['LANG']['USER10'])); ?>
</li>
                <li><?php echo ((is_array($_tmp=$this->_tpl_vars['people']['guests'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['GUEST'], $this->_tpl_vars['LANG']['GUEST2'], $this->_tpl_vars['LANG']['GUEST10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['GUEST'], $this->_tpl_vars['LANG']['GUEST2'], $this->_tpl_vars['LANG']['GUEST10'])); ?>
</li>
                <li><?php echo $this->_tpl_vars['online_link']; ?>
</li>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['cfg']['show_gender']): ?>
    <div class="stat_block">
        <div class="title"> ÚÓ Ï˚?</div>
        <div class="body">
            <ul>
                <li><a href="javascript:void(0)" rel=înofollowî onclick="searchGender('m')"><?php echo ((is_array($_tmp=$this->_tpl_vars['gender_stats']['male'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['MALE1'], $this->_tpl_vars['LANG']['MALE2'], $this->_tpl_vars['LANG']['MALE10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['MALE1'], $this->_tpl_vars['LANG']['MALE2'], $this->_tpl_vars['LANG']['MALE10'])); ?>
</a></li>
                <li><a href="javascript:void(0)" rel=înofollowî onclick="searchGender('f')"><?php echo ((is_array($_tmp=$this->_tpl_vars['gender_stats']['female'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['FEMALE1'], $this->_tpl_vars['LANG']['FEMALE2'], $this->_tpl_vars['LANG']['FEMALE10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['FEMALE1'], $this->_tpl_vars['LANG']['FEMALE2'], $this->_tpl_vars['LANG']['FEMALE10'])); ?>
</a></li>
                <li><?php echo $this->_tpl_vars['LANG']['UNKNOWN']; ?>
 &mdash; <?php echo $this->_tpl_vars['gender_stats']['unknown']; ?>
</li>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['cfg']['show_city']): ?>
    <div class="stat_block">
        <div class="title"><?php echo $this->_tpl_vars['LANG']['WHERE_WE_FROM']; ?>
</div>
        <div class="body">
            <ul>
                <?php $_from = $this->_tpl_vars['city_stats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['city']):
?>
                    <?php if ($this->_tpl_vars['city']['href']): ?>
                        <li><a href="<?php echo $this->_tpl_vars['city']['href']; ?>
" rel=înofollowî><?php echo $this->_tpl_vars['city']['city']; ?>
</a> &mdash; <?php echo $this->_tpl_vars['city']['count']; ?>
</li>
                    <?php else: ?>
                        <li><?php echo $this->_tpl_vars['city']['city']; ?>
 &mdash; <?php echo $this->_tpl_vars['city']['count']; ?>
</li>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['cfg']['show_bday'] && $this->_tpl_vars['bday']): ?>
        <div class="stat_block_bday" style="margin-top:10px;">
            <div class="title"><?php echo $this->_tpl_vars['LANG']['TODAY_BIRTH']; ?>
:</div>
            <div class="body">
                <?php echo $this->_tpl_vars['bday']; ?>

            </div>
        </div>
    <?php endif; ?>
    
</div>