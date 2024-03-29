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

	function mod_rss($module_id){	
        $inCore = cmsCore::getInstance();
        $inDB = cmsDatabase::getInstance();
		$cfg = $inCore->loadModuleConfig($module_id);
	
		include_once PATH.'/includes/rss/lastRSS.php';
		
		$rss = new lastRSS;
		
		$rss->cache_dir = PATH.'/includes/rss/cache';
		$rss->cache_time = 3600; // one hour
		$rss->cp = 'cp1251';

		$items_limit = $cfg['itemslimit'];
		$icount = 0; $i = 1;
		
		if ($rs = $rss->get($cfg['rssurl'])) {
			echo '<table width="100%" cellpadding="4" cellspacing="0">';						
			foreach($rs['items'] as $item){
				
				if ($i == 1){ echo '<tr>'; }
				
				if ($cfg['showicon']){
					echo '<td width="16" valign="top"><img src="/images/icons/rssitem.gif" /></td>';			
				}
				echo '<td valign="top">';
					echo '<div><a target="_blank" href="'.$item['link'].'">'.$item['title'].'</a></div>';
					if($cfg['showdesc']){
						echo '<div>'.$item['description'].'</div>';
					}
				echo '</td>';
				
				if ($i == $cfg['cols']){ echo '</tr>';	}
				
				if ($i < $cfg['cols']) { $i++; } else { $i = 1; }
				
				$icount++;
				if ($icount == $items_limit){ break; }
			}			
			echo '</table>';
		}
		
		return true;	
	}
?>