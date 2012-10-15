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

	session_start();

	define("VALID_CMS", 1);	
    define('PATH', $_SERVER['DOCUMENT_ROOT']);

	include(PATH.'/core/cms.php');

    $inCore = cmsCore::getInstance();

    define('HOST', 'http://' . $inCore->getHost());
    
    $inCore->loadClass('user');
	$inCore->loadLib('karma');

    $inDB       = cmsDatabase::getInstance();
    $inUser     = cmsUser::getInstance();

    $inUser->update();

	if(!$inUser->id) { $inCore->halt(); }

    $comment_id     = $inCore->request('comment_id', 'int');
    $vote           = $inCore->request('vote', 'int');

	if(!$comment_id || abs($vote) != 1) { $inCore->halt(); }

	$com_user_id = $inDB->get_field('cms_comments', "id='$comment_id'", 'user_id');
	if($com_user_id === false) { $inCore->halt(); }

    if ($inUser->id != $com_user_id){        
        cmsSubmitKarma('comment', $comment_id, $vote);    	        
    }

    $karma = cmsKarma('comment', $comment_id);

    if ($karma['points']>0){
        $karma['points'] = '<span class="cmm_good">+'.$karma['points'].'</span>';
    } elseif ($karma['points']<0){
        $karma['points'] = '<span class="cmm_bad">'.$karma['points'].'</span>';
    }

    echo $karma['points'];
	
?>