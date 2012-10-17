<?php /* Smarty version 2.6.19, created on 2012-10-17 13:42:37
         compiled from com_catalog_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_catalog_item.tpl', 20, false),)), $this); ?>

<?php if ($this->_tpl_vars['cat']['view_type'] == 'shop'): ?>
	<div id="shop_toollink_div">
		<?php echo $this->_tpl_vars['shopCartLink']; ?>

    </div>
<?php endif; ?>
			
<div class="con_heading"><?php echo $this->_tpl_vars['item']['title']; ?>
</div>

<table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:10px"><tr>
	<td align="left" valign="top" width="10" class="uc_detailimg">

        <div>
		<?php if (strlen ( $this->_tpl_vars['item']['imageurl'] ) > 4): ?>
                <a class="lightbox-enabled" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" rel="lightbox" href="/images/catalog/<?php echo $this->_tpl_vars['item']['imageurl']; ?>
" target="_blank">
                    <img alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" src="/images/catalog/medium/<?php echo $this->_tpl_vars['item']['imageurl']; ?>
.jpg" border="0" />
                </a>
        <?php else: ?>
                <img src="/images/catalog/medium/nopic.jpg" border="0" />
        <?php endif; ?>
        </div>
		
		
    </td>
	
    <td class="uc_list_itemdesc" align="left" valign="top" class="uc_detaildesc">
    
        <ul class="uc_detaillist">
        	<li class="uc_detailfield"><strong><?php echo $this->_tpl_vars['LANG']['ADDED_BY']; ?>
: </strong> <?php echo $this->_tpl_vars['getProfileLink']; ?>
</li>
			<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['value']):
?>
                <?php if ($this->_tpl_vars['value']): ?>
                    <?php if (strstr ( $this->_tpl_vars['field'] , '/~l~/' )): ?>
                        <li class="uc_detailfield"><?php echo $this->_tpl_vars['value']; ?>
</li>
                    <?php else: ?>
                        <li class="uc_detailfield"><strong><?php echo $this->_tpl_vars['field']; ?>
: </strong><?php echo $this->_tpl_vars['value']; ?>
</li>
                    <?php endif; ?>
                <?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
							
							
        <?php if ($this->_tpl_vars['cat']['view_type'] == 'shop'): ?>
			<div id="shop_price">
                <span><?php echo $this->_tpl_vars['LANG']['PRICE']; ?>
:</span> <?php echo $this->_tpl_vars['item']['price']; ?>
 <?php echo $this->_tpl_vars['LANG']['RUB']; ?>

            </div>
        
					
			<div id="shop_ac_itemdiv">
                <a href="/catalog/addcart<?php echo $this->_tpl_vars['item']['id']; ?>
.html" title="<?php echo $this->_tpl_vars['LANG']['ADD_TO_CART']; ?>
" id="shop_ac_item_link">
					<img src="/components/catalog/images/shop/addcart.jpg" border="0" alt="<?php echo $this->_tpl_vars['LANG']['ADD_TO_CART']; ?>
"/>
                </a>
            </div>
        <?php endif; ?>

		
        <?php if ($this->_tpl_vars['item']['on_moderate']): ?>
		
                <div id="shop_moder_form">
                    <p class="notice"><?php echo $this->_tpl_vars['LANG']['WAIT_MODERATION']; ?>
:</p>
                    <table cellpadding="0" cellspacing="0" border="0"><tr>
                    <td>
                            <form action="/catalog/moderation/accept<?php echo $this->_tpl_vars['item']['id']; ?>
.html" method="POST">
                                <input type="submit" name="accept" value="<?php echo $this->_tpl_vars['LANG']['MODERATION_ACCEPT']; ?>
"/>
                            </form>
                          </td>
                    <td>
                            <form action="/admin/index.php" target="_blank" method="GET">
                                <input type="hidden" name="view" value="components" />
                                <input type="hidden" name="do" value="config" />
                                <input type="hidden" name="link" value="catalog" />
                                <input type="hidden" name="opt" value="edit_item" />
                                <input type="hidden" name="item_id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />
                                <input type="submit" name="accept" value="<?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
"/>
                            </form>
                          </td>
                    <td>
                            <form action="/catalog/moderation/reject<?php echo $this->_tpl_vars['item']['id']; ?>
.html" method="POST">
                                 <input type="submit" name="accept" value="<?php echo $this->_tpl_vars['LANG']['MODERATION_REJECT']; ?>
"/>
                            </form>
                          </td>
                    </tr></table>
					
                </div>
        <?php endif; ?>
		
	</td>
</tr></table>



<?php if (( $this->_tpl_vars['cat']['showtags'] ) && ( $this->_tpl_vars['tagline'] )): ?>
    <div class="uc_detailtags"><strong><?php echo $this->_tpl_vars['LANG']['TAGS']; ?>
: </strong><?php echo $this->_tpl_vars['tagline']; ?>
</div>
<?php endif; ?>
			

<?php if ($this->_tpl_vars['cat']['is_ratings']): ?>
	<?php echo $this->_tpl_vars['ratingForm']; ?>

<?php endif; ?>
