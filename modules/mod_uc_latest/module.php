<?php
/******************************************************************************/
//                                                                            //
//                             InstantCMS v1.9                                //
//                        http://www.instantcms.ru/                           //
//                                                                            //
//                   written by InstantCMS Team, 2007-2011                    //
//                produced by InstantSoft, (www.instantsoft.ru)               //
//                                                                            //
//                        LICENSED BY GNU/GPL v2                              //
//                                                                            //
/******************************************************************************/

function mod_uc_latest($module_id){
        $inCore = cmsCore::getInstance();
        $inDB = cmsDatabase::getInstance();
	
		$cfg = $inCore->loadModuleConfig($module_id);
		
		if ($cfg['cat_id']>0){

            if (!$cfg['subs']){
				//select from category
				$catsql = ' AND i.category_id = '.$cfg['cat_id'];
			} else {
				//select from category and subcategories
				$rootcat  = $inDB->get_fields('cms_uc_cats', 'id='.$cfg['cat_id'], 'NSLeft, NSRight');
				$catsql   = "AND (c.NSLeft >= {$rootcat['NSLeft']} AND c.NSRight <= {$rootcat['NSRight']})";
			}

		} else {
			$catsql = '';
		}
		
		$sql = "SELECT i.*, i.pubdate as fdate, c.view_type as viewtype
				FROM cms_uc_items i
				LEFT JOIN cms_uc_cats c ON c.id = i.category_id
				WHERE i.published = 1 ".$catsql."
				ORDER BY i.pubdate DESC
				LIMIT ".$cfg['newscount'];		

		$result = $inDB->query($sql);
		
		$items = array();
		$is_uc = false;
		
		if ($inDB->num_rows($result)){

			$is_uc = true;

            $inCore->includeFile('components/catalog/includes/shopcore.php');

			if ($cfg['showtype']=='thumb'){
					while($item = $inDB->fetch_assoc($result)){
						if (strlen($item['imageurl'])<4) {
							$item['imageurl'] = 'nopic';
						} elseif (!file_exists(PATH.'/images/catalog/small/'.$item['imageurl'].'.jpg')) {
							$item['imageurl'] = 'nopic';
						} 
                        if ($item['viewtype']=='shop'){
							$item['price'] = number_format(shopDiscountPrice($item['id'], $item['category_id'], $item['price']), 2, '.', ' ');
                        }
						$items[] = 	$item;												
					}
			}
			
			if ($cfg['showtype']=='list'){
					while($item = $inDB->fetch_assoc($result)){
							$item['fieldsdata'] = unserialize($item['fieldsdata']);
							$item['title'] = substr($item['title'], 0, 40);
							
							for($f = 0; $f<$cfg['showf']; $f++){
								$item['fdata'][] = $inCore->getUCSearchLink($item['category_id'], null, $f, stripslashes($item['fieldsdata'][$f]));
							}							
													
							$item['fdate'] = $inCore->dateFormat($item['fdate']);
							if ($item['viewtype']=='shop'){
								$item['price'] = number_format(shopDiscountPrice($item['id'], $item['category_id'], $item['price']), 2, '.', ' ');
							}	
							$items[] = 	$item;	
					}				
				}
			}
		
		$smarty = $inCore->initSmarty('modules', 'mod_latest_uc.tpl');			
		$smarty->assign('items', $items);
		$smarty->assign('cfg', $cfg);
		$smarty->assign('is_uc', $is_uc);			
		$smarty->display('mod_latest_uc.tpl');
		
		return true;
}
?>