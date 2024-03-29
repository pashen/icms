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

    header('Content-Type: text/html; charset=windows-1251');
    session_start();

	define("VALID_CMS", 1);
    define('PATH', $_SERVER['DOCUMENT_ROOT']);

	include(PATH.'/core/cms.php');

    $inCore = cmsCore::getInstance();

    define('HOST', 'http://' . $inCore->getHost());

    $inCore->loadClass('config');       //������������
    $inCore->loadClass('db');           //���� ������
    $inCore->loadClass('user');			//����

    $inUser = cmsUser::getInstance();
    $inDB  = cmsDatabase::getInstance();

	$place = $inCore->request('place', 'str');
	
	// ���� ����� �� ����������, ������� ������ � �������
	if (!$place) { 
			echo "{";
			echo		"error: '���� �� ��������!',\n";
			echo		"msg: ''\n";
			echo "}";
			die();
	}
	
	// ���� � ����� ���������� ����������� ������, �������
	if (!preg_match('/^([a-zA-Z0-9\_]+)$/i', $place)) { die(); }
	
	// ���� �� ������������, ������� ������ � �������
	$inUser->update();
    if (!$inUser->id) {
			echo "{";
			echo		"error: '�������� ������ ������ ��� ������������������!',\n";
			echo		"msg: ''\n";
			echo "}";
			die();
	}
	
	if(isset($_FILES['attach_img'])) {

		//LOAD CURRENT CONFIG
        $cfg = $inCore->loadComponentConfig($place);

		if (!isset($cfg['img_max'])) { $cfg['img_max'] = 50; }
		if (!isset($cfg['img_on'])) { $cfg['img_on'] = 1; } 
		if (!isset($cfg['watermark'])) { $cfg['watermark'] = 1; } 
		if (!isset($cfg['img_w'])) { $cfg['img_w'] = 600; }
		if (!isset($cfg['img_h'])) { $cfg['img_h'] = 600; }
		
		if ($cfg['img_on']){
		
			$sql    = "SELECT * FROM cms_upload_images WHERE session_id = '".session_id()."'";
			$rs     = $inDB->query($sql);
			$loaded = $inDB->num_rows($rs);
			
			if ($loaded < $cfg['img_max']){

				$uploaddir  = PATH.'/upload/'.$place.'/';
				$realfile   = $_FILES['attach_img']['name'];
			
				$path_parts = pathinfo($realfile);
                $ext        = strtolower($path_parts['extension']);
				
				if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'bmp' || $ext == 'png'){

					// ������������ ����
					$filename       = md5($realfile.time()).'-orig.'.$ext;
					$uploadfile     = $uploaddir . $filename;
					// ������������ ����
                    $filename_jpg   = md5($realfile.time()).'.jpg';
					$uploadphoto    = $uploaddir . $filename_jpg;
					// url �����
					$fileurl = '/upload/'.$place.'/'.$filename_jpg;

					if ($inCore->moveUploadedFile($_FILES['attach_img']['tmp_name'], $uploadfile, $_FILES['attach_img']['error'])) {

						$inCore->includeGraphics();
						$sql = "INSERT INTO cms_upload_images (post_id, session_id, fileurl, target)
								VALUES ('0', '".session_id()."', '{$fileurl}', '$place')";
						$inDB->query($sql);

                        @img_resize($uploadfile, $uploadphoto, $cfg['img_w'], $cfg['img_h']);

						if ($cfg['watermark']) { @img_add_watermark($uploadphoto); }

                        @unlink($uploadfile);

						echo "{";
						echo	"error: '',\n";
						echo	"msg: '".$filename_jpg."'\n";
						echo "}";
					} else { 
						echo "{";
						echo	"error: '���� �� ��������! ��������� ��� ���, ������ � ����� �� ������ � ����� /upload/$place.',\n";
						echo	"msg: ''\n";
						echo "}";
					} 
					
				} else { 
						echo "{";
						echo	"error: '�������� ��� �����! ���������� ����: jpg, jpeg, gif, png, bmp.',\n";
						echo	"msg: ''\n";
						echo "}";
				} //filetype
			}//max limit
			else {
					echo "{";
					echo		"error: '��������� ������ ���������� �����������!',\n";
					echo		"msg: ''\n";
					echo "}";	
				}

		} //img is on
		else {
			echo "{";
			echo		"error: '�������� ������ ���������!',\n";
			echo		"msg: ''\n";
			echo "}";	
		}
	} else { 	
			echo "{";
			echo		"error: '���� �� ��������!',\n";
			echo		"msg: ''\n";
			echo "}";
	 }

	return;
?>