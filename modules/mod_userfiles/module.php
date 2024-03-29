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

function fetchFiles($sql){

    $inDB       = cmsDatabase::getInstance();
    $files      = array();

    $result     = $inDB->query($sql);

    if ($inDB->num_rows($result)){
        while($file = $inDB->fetch_assoc($result)){
            $file['size']   = round(($file['filesize'] / 1024) / 1024, 2);
            $files[]        = $file;
        }
    }

    return $files;

}

function mod_userfiles($module_id){

        $inCore     = cmsCore::getInstance();
        $inDB       = cmsDatabase::getInstance();

		$cfg        = $inCore->loadModuleConfig($module_id);

        if (!isset($cfg['sw_stats']))       { $cfg['sw_stats']      = 1;  }
		if (!isset($cfg['sw_latest']))      { $cfg['sw_latest']     = 1;  }
		if (!isset($cfg['sw_popular']))     { $cfg['sw_popular']    = 1;  }
		if (!isset($cfg['num_latest']))     { $cfg['num_latest']    = 5;  }
		if (!isset($cfg['num_popular']))    { $cfg['num_popular']   = 5;  }

        $latest     = array();
        $popular    = array();
        $stats      = array();

        //-------------------------- ����� ����� --------------------------------------

        if ($cfg['sw_latest'] && $cfg['num_latest']){

            $sql = "SELECT f.*,
                           u.nickname as user_nickname, u.login as user_login
					FROM cms_user_files f, cms_users u
					WHERE f.user_id = u.id AND f.allow_who = 'all'
					ORDER BY f.pubdate desc
					LIMIT {$cfg['num_latest']}";

            $latest = fetchFiles($sql);

        }

        //-------------------------- ���������� ����� ---------------------------------

        if ($cfg['sw_popular'] && $cfg['num_popular']){

            $sql = "SELECT f.*,
                           u.nickname as user_nickname, u.login as user_login
					FROM cms_user_files f, cms_users u
					WHERE f.user_id = u.id AND f.allow_who = 'all'
					ORDER BY f.hits desc
					LIMIT {$cfg['num_popular']}";

            $popular = fetchFiles($sql);

        }

        //----------------------------- ���������� ------------------------------------

        if ($cfg['sw_stats']){

            $stats['total_files']   = $inDB->rows_count('cms_user_files', "allow_who='all'");

            $stats['total_size']    = 0;

            $sql = "SELECT SUM(f.filesize) as bytes
					FROM cms_user_files f
					WHERE f.allow_who = 'all'";

            $result = $inDB->query($sql);

            if ($inDB->num_rows($result)){
                $size                   = $inDB->fetch_assoc($result);
                $stats['total_size']    = round(($size['bytes'] / 1024) / 1024, 2);
            }
            
        }        

        //-----------------------------------------------------------------------------

        if (!$popular && !$latest){
            echo '<p>��� ������.</p>';
            return true;
        }

        $smarty = $inCore->initSmarty('modules', 'mod_userfiles.tpl');

        if ($latest) $smarty->assign('latest', $latest);
        if ($popular) $smarty->assign('popular', $popular);
        if ($stats) $smarty->assign('stats', $stats);

        $smarty->assign('cfg', $cfg);
        $smarty->display('mod_userfiles.tpl');
        
		return true;
        
}
?>