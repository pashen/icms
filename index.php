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

    Error_Reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    define('PATH', $_SERVER['DOCUMENT_ROOT']);

////////////////////////////// ��������� ��� ������� ����������� /////////////////////////////

    if(is_dir('install')||is_dir('migrate')) {
        if (!file_exists(PATH.'/includes/config.inc.php')){
            header('location:/install/');
        } else {
            include(PATH.'/core/messages/installation.html');
            die();
        }
    }

/////////////////////////////////// ���������� //////////////////////////////////////////////
	
	define("VALID_CMS", 1);	
	session_start();    

	include('core/cms.php');                        //����
    include(PATH.'/includes/config.inc.php');       //������, �������� ��� ������ ��������

    $inCore = cmsCore::getInstance();

    define('HOST', 'http://' . $inCore->getHost());

/////////////////////////////////// �������� ������ /////////////////////////////////////////

    $inCore->startGenTimer();
    
////////////////////////// ��������� ������ ������ //////////////////////////////////////////
   
    $inCore->loadClass('page');         //��������    
    $inCore->loadClass('plugin');       //�������
    $inCore->loadClass('user');         //������������
    $inCore->loadClass('actions');      //����� ����������    

    $inDB   = cmsDatabase::getInstance();
    $inPage = cmsPage::getInstance();
    $inConf = cmsConfig::getInstance();
    $inUser = cmsUser::getInstance();

    cmsCore::loadLanguage('lang');      //������� �������� ����

	$inUser->autoLogin();     //������������� ���������� ������������, ���� ������ �����

    //��������� ��� ������������ �� ������ � �� �������
    if (!$inUser->update() && !$_SERVER['REQUEST_URI']!=='/logout') { $inCore->halt(); }

    //���������� ��������� ������� ��������
    $home_title = $inConf->hometitle ? $inConf->hometitle : $inConf->sitename;

    //������������� ��������� �������� � �������� �����
    $inPage->setTitle( $inConf->sitename );

////////////////////////// ���������, ������� �� ���� //////////////////////////

    //���� ���� �������� � ������������ �� �������������,
    //�� ���������� ������ ��������� � ��� ��� ���� ��������
	if ( $inConf->siteoff &&
        !$inUser->is_admin &&
        $_SERVER['REQUEST_URI']!='/login' &&
        $_SERVER['REQUEST_URI']!='/logout'
       ) {
            $inPage->includeTemplateFile('special/siteoff.php');
            $inCore->halt();
	}

    //���� ���� ��������, �� ������������ - �������������,
    //�� ������� ������� � ���������� "��������, ���� ��������"
    if ($inConf->siteoff && $inUser->is_admin) {
       echo $inPage->siteOffNotify();
    }

//////////////////////////// ���������� ������������� //////////////////////////
	
	$inCore->onlineStats();   //��������� ���������� ��������� �����
	
////////////////////////////// ��������� �������� //////////////////////////////
	
	//�������� ID �������� ������ ����
	$menuid = $inCore->menuId();
		
	//������ ����������
	$inPage->addPathway($_LANG['PATH_HOME'], '/');
    $inPage->setTitle( $inCore->menuTitle() );
	if ($menuid > 1) { $inPage->addMenuPathway($menuid); }

	//��������� ������ ������������
    //��� ������������� ����������
	//������ ���� �������� (��������� ������� ���������)
    if ($inCore->checkMenuAccess()) $inCore->proceedBody();

//////////////////////////////////// ����� ������� /////////////////////////////

    //��������� ����� �� �������� ������� �������� (splash)
	if($inCore->isSplash()){
        //���������� ������� ��������
		if (!$inPage->showSplash()){
            //���� ������ ������� �������� �� ��� ������,
            //���������� ������� ������ �����
            $inPage->showTemplate();
        }
	} else {
        //���������� ������ �����
		$inPage->showTemplate();
	}

////////////// ��������� � ������� ����� ���������, ������� � ���� /////////////

	if ($inDB->q_count && $inConf->debug) {
		$time = $inCore->getGenTime();
		echo $_LANG['DEBUG_TIME_GEN_PAGE'].' '.number_format($time, 4).' '.$_LANG['DEBUG_SEC'];
		echo '<br />'.$_LANG['DEBUG_QUERY_DB'];
		echo ' '.$inDB->q_count.'<br />';
		echo $inDB->q_dump;
	}
//////////////////////// ������� ��������� ���������� //////////////////////////

    $inCore->clearSessionTrash();

?>
