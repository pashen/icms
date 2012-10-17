<?php /* Smarty version 2.6.19, created on 2012-10-17 13:42:29
         compiled from com_catalog_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_catalog_view.tpl', 46, false),)), $this); ?>

<div id="shop_toollink_div">
	<a id="shop_searchlink" href="/catalog/<?php echo $this->_tpl_vars['cat']['id']; ?>
/search.html"><?php echo $this->_tpl_vars['LANG']['SEARCH_BY_CAT']; ?>
</a>
	<?php if ($this->_tpl_vars['cat']['view_type'] == 'shop'): ?> <?php echo $this->_tpl_vars['shopcartlink']; ?>
	<?php endif; ?>
    <?php if ($this->_tpl_vars['is_can_add']): ?>
    <a id="shop_addlink" href="/catalog/<?php echo $this->_tpl_vars['cat']['id']; ?>
/add.html"><?php echo $this->_tpl_vars['LANG']['ADD_ITEM']; ?>
</a>
    <?php endif; ?>
</div>

<?php if ($this->_tpl_vars['cfg']['is_rss']): ?>
	    <h1 class="con_heading"><?php echo $this->_tpl_vars['cat']['title']; ?>
 <a href="/rss/catalog/<?php echo $this->_tpl_vars['cat']['id']; ?>
/feed.rss" title="<?php echo $this->_tpl_vars['LANG']['RSS']; ?>
"><img src="/images/markers/rssfeed.png" border="0" alt="<?php echo $this->_tpl_vars['LANG']['RSS']; ?>
"/></a></h1>
<?php else: ?>
	    <h1 class="con_heading"><?php echo $this->_tpl_vars['cat']['title']; ?>
</h1>
<?php endif; ?>

<?php if ($this->_tpl_vars['cat']['description']): ?>
	<div class="con_description"><?php echo $this->_tpl_vars['cat']['description']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['subcats']): ?>
	<div class="uc_subcats"><?php echo $this->_tpl_vars['subcats']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['alphabet']): ?> <?php echo $this->_tpl_vars['alphabet']; ?>
 <?php endif; ?>

<?php if ($this->_tpl_vars['cat']['showsort']): ?> <?php echo $this->_tpl_vars['orderform']; ?>
 <?php endif; ?>

<?php if ($this->_tpl_vars['itemscount'] > 0): ?>

	<?php if ($this->_tpl_vars['page'] > 1): ?> <p>Страница <?php echo $this->_tpl_vars['page']; ?>
</p> <?php endif; ?>
	
	<?php if ($this->_tpl_vars['search_details']): ?> <?php echo $this->_tpl_vars['search_details']; ?>
 <?php endif; ?>
	
		<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['item']):
?>
				
			<?php if ($this->_tpl_vars['cat']['view_type'] == 'list' || $this->_tpl_vars['cat']['view_type'] == 'shop'): ?>
				<div class="catalog_list_item">
					<table border="0" cellspacing="2" cellpadding="0" id="catalog_item_table"><tr>
						<td valign="top" align="center" id="catalog_list_itempic" width="110">							
								<?php if ($this->_tpl_vars['item']['imageurl']): ?>
									<a class="lightbox-enabled" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" rel="lightbox" href="/images/catalog/<?php echo $this->_tpl_vars['item']['imageurl']; ?>
">
										<img alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" src="/images/catalog/small/<?php echo $this->_tpl_vars['item']['imageurl']; ?>
.jpg" border="0" />
									</a>
								<?php else: ?>
									<a href="/catalog/item<?php echo $this->_tpl_vars['item']['id']; ?>
.html">
										<img alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" src="/images/catalog/small/nopic.jpg" border="0" />								
									</a>										
								<?php endif; ?>
							<?php if ($this->_tpl_vars['cat']['view_type'] == 'shop'): ?>
								<div id="shop_small_price">
									<span><?php echo $this->_tpl_vars['item']['price']; ?>
</span> <?php echo $this->_tpl_vars['LANG']['RUB']; ?>

								</div>
							<?php endif; ?>
						</td>
						<td class="uc_list_itemdesc" align="left" valign="top">
                            <?php if ($this->_tpl_vars['item']['can_edit']): ?>
                                <div class="uc_item_edit">
                                    <a href="/catalog/<?php echo $this->_tpl_vars['cat']['id']; ?>
/edit<?php echo $this->_tpl_vars['item']['id']; ?>
.html" class="uc_item_edit_link"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a>
                                </div>
                            <?php endif; ?>
							<div>
								<a class="uc_itemlink" href="/catalog/item<?php echo $this->_tpl_vars['item']['id']; ?>
.html"><?php echo $this->_tpl_vars['item']['title']; ?>
</a> 
								<?php if ($this->_tpl_vars['item']['is_new']): ?>
									<span class="uc_new"><img src="/images/ratings/new.gif" border="0"/></span>
								<?php endif; ?>									
							</div>
							<?php if ($this->_tpl_vars['cat']['is_ratings']): ?>
								<div class="uc_rating"><?php echo $this->_tpl_vars['item']['rating']; ?>
</div>
							<?php endif; ?>

							<div class="uc_itemfieldlist">
								<?php $_from = $this->_tpl_vars['item']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['value']):
?>
                                    <?php if ($this->_tpl_vars['value']): ?>
                                        <?php if (! strstr ( $this->_tpl_vars['field'] , '/~l~/' )): ?>
                                            <div class="uc_itemfield"><strong><?php echo $this->_tpl_vars['field']; ?>
</strong>: <?php echo $this->_tpl_vars['value']; ?>

                                        <?php else: ?>
                                            <?php echo $this->_tpl_vars['value']; ?>

                                        <?php endif; ?>
                                    <?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							</div>
                            <?php if ($this->_tpl_vars['item']['tagline'] && $this->_tpl_vars['cat']['showtags']): ?>
								<div class="uc_tagline"><strong><?php echo $this->_tpl_vars['LANG']['TAGS']; ?>
:</strong> <?php echo $this->_tpl_vars['item']['tagline']; ?>
</div>
							<?php endif; ?>

							<?php if ($this->_tpl_vars['cat']['view_type'] == 'list'): ?>
								<?php if ($this->_tpl_vars['cat']['showmore']): ?>
									<a href="/catalog/item<?php echo $this->_tpl_vars['item']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['DETAILS']; ?>
...</a>
								<?php endif; ?>										
							<?php else: ?>
								<div id="shop_list_buttons">
									<a href="/catalog/item<?php echo $this->_tpl_vars['item']['id']; ?>
.html" title="<?php echo $this->_tpl_vars['LANG']['DETAILS']; ?>
">
										<img src="/components/catalog/images/shop/more.jpg" border="0" alt="<?php echo $this->_tpl_vars['LANG']['DETAILS']; ?>
"/>
									</a> 
									<a href="/catalog/addcart<?php echo $this->_tpl_vars['item']['id']; ?>
.html" title="<?php echo $this->_tpl_vars['LANG']['ADD_TO_CART']; ?>
">
										<img src="/components/catalog/images/shop/addcart.jpg" border="0" alt="<?php echo $this->_tpl_vars['LANG']['ADD_TO_CART']; ?>
"/>
									</a>
								</div>
							<?php endif; ?>

						</td>											
					</tr></table>
				</div>
			<?php endif; ?>
					
			<?php if ($this->_tpl_vars['cat']['view_type'] == 'thumb'): ?>
				<div class="uc_thumb_item">
					<table border="0" cellspacing="2" cellpadding="0" width="100%">
						<tr><td height="110" align="center" valign="middle">
							<a href="/catalog/item<?php echo $this->_tpl_vars['item']['id']; ?>
.html">
								<?php if ($this->_tpl_vars['item']['imageurl']): ?>
									<img alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" src="/images/catalog/small/<?php echo $this->_tpl_vars['item']['imageurl']; ?>
.jpg" border="0" />
								<?php else: ?>
									<img alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" src="/images/catalog/small/nopic.jpg" border="0" />								
								<?php endif; ?>
							</a>
						</td></tr>
						<tr><td align="center" valign="middle">
							<a class="uc_thumb_itemlink" href="/catalog/item<?php echo $this->_tpl_vars['item']['id']; ?>
.html"><?php echo $this->_tpl_vars['item']['title']; ?>
</a>								
						</td></tr>						
					</table>
				</div>				
			<?php endif; ?>															
		<?php endforeach; endif; unset($_from); ?>
		
		<?php echo $this->_tpl_vars['pagebar']; ?>

<?php endif; ?>