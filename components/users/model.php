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

if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

class cms_model_users{

	function __construct(){
        $this->inDB = cmsDatabase::getInstance();
    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function install(){

        return true;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function getCommentTarget($target, $target_id) {

        $result = array();

        switch($target){

            case 'userphoto': $photo = $this->inDB->get_fields('cms_user_photos', "id='{$target_id}'", 'user_id, title');
                              if (!$photo) { return false; }
                              $result['link']  = '/users/'.$photo['user_id'].'/photo'.$target_id.'.html';
                              $result['title'] = $photo['title'];
                              break;

        }

        return ($result ? $result : false);

    }
/* ==================================================================================================== */
/* ==================================================================================================== */
   //
   // ���� ����� ���������� ����������� comments ��� �������� ������ �����������
   //
   // ����� ������ ������� 0 ��� 1
   //
   public function getVisibility($target, $target_id) {

        $is_hidden = 0;

        switch($target){

            case 'userphoto': 	$photo = $this->inDB->get_fields('cms_user_photos', "id='{$target_id}'", 'album_id, allow_who');
								if($photo['allow_who'] != 'all') { $is_hidden = 1; }
								$album = $this->getPhotoAlbum('private', $photo['album_id']);
								if($album['allow_who'] != 'all') { $is_hidden = 1; }
                              	break;

        }

        return $is_hidden;

    }
/* ==================================================================================================== */
/* ==================================================================================================== */

    public function getUser($user_id){

		$sql = "SELECT		        
				u.id as id,
				u.login,
				u.nickname,
				u.email,
				u.icq,
		        u.is_deleted as is_deleted,
                u.regdate fregdate,
                u.birthdate as birthdate,
                u.status as status_text,
				DATE_FORMAT(u.status_date, '%d-%m-%Y %H:%i') as status_date,
                u.logdate as flogdate,
				u.rating as user_rating,
                p.city, p.description, p.showmail, p.showbirth, p.showicq,
				p.karma, p.imageurl, p.allow_who,
				p.gender as gender,	p.formsdata,			
				u.group_id,
				g.title as grp,
				g.alias as group_alias,
				o.user_id as status,
				b.user_id as banned,
                IFNULL(ui.login, '') as inv_login,
                IFNULL(ui.nickname, '') as inv_nickname
                FROM cms_users u
				INNER JOIN cms_user_profiles p ON p.user_id = u.id
				INNER JOIN cms_user_groups g ON g.id = u.group_id
				LEFT JOIN cms_online o ON o.user_id = u.id
				LEFT JOIN cms_banlist b ON b.user_id = u.id
                LEFT JOIN cms_users ui ON ui.id = u.invited_by
                WHERE u.is_locked = 0 AND u.id = '$user_id'
                LIMIT 1";

        $result = $this->inDB->query($sql);

        if (!$this->inDB->num_rows($result)){ return false; }
        
        $user = $this->inDB->fetch_assoc($result);

        $user = cmsCore::callEvent('GET_USER', $user);

        return $user;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function getUserShort($user_id = 0){
				
		$inUser = cmsUser::getInstance();
				
		if ($inUser->id == $user_id) { 
		
			$user['id'] 		= $user_id;
			$user['login'] 		= $inUser->login;
			$user['nickname'] 	= $inUser->nickname;
		
		} else {
		
            $user = $this->inDB->get_fields('cms_users', "id = '$user_id'", 'id, nickname, login');
        
		}
        
		if (!$user){ return false; }

        return $user;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function getUserTotal($online = false){
		
		if (!$online) {
			$total = $this->inDB->rows_count('cms_users', 'is_locked=0 AND is_deleted=0');
		} else {
			$total = $this->inDB->rows_count('cms_online o LEFT JOIN cms_users u ON  u.id = o.user_id', 'u.is_locked = 0 AND u.is_deleted = 0 GROUP BY o.user_id');
		}
		if (!$total ){ return false; }

        return $total ;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function isNewFriends($user_id, $from_id=0){

        if (!$from_id){
            $sql = "SELECT 1 FROM cms_user_friends WHERE to_id = '$user_id' AND is_accepted = 0";
        } else {
            $sql = "SELECT 1 FROM cms_user_friends WHERE to_id = '$user_id' AND from_id = '$from_id' AND is_accepted = 0";
        }

        $result = $this->inDB->query($sql);

        return (bool)$this->inDB->num_rows($result);
        
    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function getNewFriends($user_id){

		$inCore  = cmsCore::getInstance();

        $friends = array();

		$sql = "SELECT f.*, u.nickname as sender, u.login as sender_login, p.imageurl as sender_img
                FROM cms_user_friends f
				INNER JOIN cms_users u ON f.from_id = u.id
				INNER JOIN cms_user_profiles p ON p.user_id = u.id
                WHERE f.to_id = '$user_id' AND f.is_accepted = 0";

        $result = $this->inDB->query($sql);

        if (!$this->inDB->num_rows($result)){ return false; }

        while($friend = $this->inDB->fetch_assoc($result)){
			$friend['sender_img'] = ($friend['sender_img']) ? '/images/users/avatars/small/'.$friend['sender_img'] : '/images/users/avatars/small/nopic.jpg';
            $friends[] = $friend;
        }

        $friends = cmsCore::callEvent('GET_NEW_FRIENDS', $friends);

		ob_start();
	
		$smarty = $inCore->initSmarty('components', 'com_users_newfriends.tpl');
	
		$smarty->assign('friends', $friends);
	
		$smarty->display('com_users_newfriends.tpl');
	
		return ob_get_clean();
        
    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function deleteUser($user_id, $is_delete = false){

        cmsCore::callEvent('DELETE_USER', $user_id);

        if ($user_id == 1) { return false; }

		if ($is_delete) {

			$avatar = $this->inDB->get_field('cms_user_profiles', "user_id = '$user_id'", 'imageurl');
            if ($avatar && $avatar != 'nopic.jpg'){
                 @unlink(PATH.'/images/users/avatars/'.$avatar);
                 @unlink(PATH.'/images/users/avatars/small/'.$avatar);
            }

			$this->inDB->query("DELETE FROM cms_users WHERE id = '$user_id' LIMIT 1");
			$this->inDB->query("DELETE FROM cms_user_profiles WHERE user_id = '$user_id' LIMIT 1");
			$this->inDB->query("DELETE FROM cms_user_wall WHERE user_id = '$user_id' AND usertype = 'user'");
			$this->inDB->query("DELETE FROM cms_user_friends WHERE to_id = '$user_id' OR from_id = '$user_id'");
			$this->inDB->query("DELETE FROM cms_user_clubs WHERE user_id = '$user_id'");

			$user_blog_id = $this->inDB->get_field('cms_blogs', "user_id = '$id'", 'id');
			if ($user_blog_id) {
				cmsCore::loadModel('blogs');
				$blog_model = new cms_model_blogs();
				$blog_model->deleteBlog($user_blog_id);
			}
			
		} else {
        	$this->inDB->query("UPDATE cms_users SET is_deleted = 1 WHERE id = '$user_id'");
		}

		$this->inDB->query("DELETE FROM cms_user_awards WHERE user_id = '$user_id'");
		$this->inDB->query("DELETE FROM cms_subscribe WHERE user_id = '$user_id'");

		cmsActions::removeUserLog($user_id);
        
    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function deleteUsers($id_list){

        foreach($id_list as $key=>$id){
            $this->deleteUser($id);
        }

        return true;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function deleteGroup($group_id){

        cmsCore::callEvent('DELETE_USER_GROUP', $group_id);

        $sql = "SELECT id FROM cms_users WHERE group_id = '$group_id'";

        $result = $this->inDB->query($sql);

        if ($this->inDB->num_rows($result)){
            while($user = $this->inDB->fetch_assoc($result)){
                $this->deleteUser($user['id']);
            }
        }

        $this->inDB->query("DELETE FROM cms_user_groups WHERE id = '$group_id'");

        return true;
        
    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function deleteGroups($id_list){

        foreach($id_list as $key=>$id){
            $this->deleteGroup($id);
        }

        return true;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function getPluginsOutput($user){

        $inCore         = cmsCore::getInstance();

        $plugins_list   = array();

        $plugins        = $inCore->getEventPlugins('USER_PROFILE');

        foreach($plugins as $plugin_name){

            $html   = '';

            $plugin = $inCore->loadPlugin( $plugin_name );

            if ($plugin!==false){                
                $html = $plugin->execute('USER_PROFILE', $user);
            }

            if ($html){

                $p['name']      = $plugin_name;
                $p['title']     = $plugin->info['tab'] ? $plugin->info['tab'] : $plugin->info['title'];
                $p['html']      = $html;

                $plugins_list[] = $p;

                $inCore->unloadPlugin($plugin);

            }

        }

        return $plugins_list;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function addInvite($invite) {

        $sql = "INSERT INTO cms_user_invites (code, owner_id, createdate, is_used, is_sended)
                VALUES ('{$invite['code']}', '{$invite['owner_id']}', NOW(), 0, 0)";

        $this->inDB->query($sql);

        return true;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function giveInvites($count, $has_karma, $inv_period=false) {

        if (!$inv_period) { $sql_period = 'DAY'; } else { $sql_period = $inv_period; }

        $sql = "SELECT  u.id as id,
                        IFNULL((u.invdate < DATE_SUB(NOW(), INTERVAL 1 {$sql_period})) OR u.invdate is NULL, 0) as is_time,
                        IFNULL(SUM(k.points), 0) as karma
                FROM cms_users u
                LEFT JOIN cms_user_karma k ON k.user_id = u.id
                WHERE is_deleted = 0
                GROUP BY u.id
                ";

        $res = $this->inDB->query($sql);

        if (!$this->inDB->num_rows($res)) { return false; }

        $given = 0;

        while($user = $this->inDB->fetch_assoc($res)){

            if ($user['karma'] < $has_karma){ continue; }
            if ($inv_period && !$user['is_time']){ continue; }

            for($c=1; $c<=$count; $c++){

                $invite['code']     = md5($user['id'] .'$'. rand(10000,65535) . '$' . time() . '$' . $c);
                $invite['owner_id'] = $user['id'];
                
                $this->addInvite($invite);

                $given++;

            }

            $this->inDB->query("UPDATE cms_users SET invdate = NOW() WHERE id = '{$user['id']}'");

        }

        return $given;

    }

    public function giveInvitesCron() {

        $inCore = cmsCore::getInstance();

        $cfg = $inCore->loadComponentConfig('registration');

        if (!isset($cfg['reg_type'])) { $cfg['reg_type'] = 'open'; }
        if (!isset($cfg['inv_count'])) { $cfg['inv_count'] = 5; }
        if (!isset($cfg['inv_karma'])) { $cfg['inv_karma'] = 50; }
        if (!isset($cfg['inv_period'])) { $cfg['inv_period'] = 'WEEK'; }

        if ($cfg['reg_type'] != 'invite') { return false; }

        $this->giveInvites($cfg['inv_count'], $cfg['inv_karma'], $cfg['inv_period']);

        return true;

    }

    public function checkInvite($code) {

        if (!preg_match('/^([a-z0-9]{32})$/i', $code)) { return false; }

        $correct = $this->inDB->get_field('cms_user_invites', "code='{$code}' AND is_used = 0", 'id');

        return (bool)$correct;

    }

    public function getInviteOwner($code) {

        if (!preg_match('/^([a-z0-9]{32})$/i', $code)) { return false; }

        $owner_id = $this->inDB->get_field('cms_user_invites', "code='{$code}' AND is_used = 0", 'owner_id');

        return $owner_id;

    }

    public function getInvite($owner_id) {

        $invite = $this->inDB->get_fields('cms_user_invites', "owner_id='{$owner_id}' AND is_used = 0 AND is_sended=0", '*');

        return $invite;

    }

    public function getUserInvitesCount($owner_id) {

        $count = $this->inDB->rows_count('cms_user_invites', "owner_id='{$owner_id}' AND is_used = 0 AND is_sended = 0");

        return $count;

    }

    public function sendInvite($owner_id, $email) {

        $inCore = cmsCore::getInstance();
        $inConf = cmsConfig::getInstance();

        global $_LANG;

        $user = $this->getUserShort($owner_id);

        if (!$user) { return false; }

        $invite = $this->getInvite($owner_id);

        if (!$invite) { return false; }

        $letter_path    = PATH.'/includes/letters/invite.txt';
        $letter         = file_get_contents($letter_path);

        $letter = str_replace('{sitename}', $inConf->sitename, $letter);
        $letter = str_replace('{site_url}', HOST, $letter);
        $letter = str_replace('{invite_code}', $invite['code'], $letter);
        $letter = str_replace('{username}', $user['nickname'], $letter);

        $inCore->mailText($email, sprintf($_LANG['INVITE_SUBJECT'], $user['nickname']), $letter);

        $this->inDB->query("UPDATE cms_user_invites SET is_sended=1 WHERE id='{$invite['id']}'");

        return true;

    }

    public function closeInvite($code){

        if (!preg_match('/^([a-z0-9]{32})$/i', $code)) { return false; }

        $this->inDB->query("UPDATE cms_user_invites SET is_used = 1 WHERE code='{$code}'");

        return true;
       
    }

    public function deleteInvites() {

        $this->inDB->query('DELETE FROM cms_user_invites WHERE is_used = 0');

        return true;

    }

    public function clearInvites() {

        $this->inDB->query('DELETE FROM cms_user_invites WHERE is_used = 1 AND is_sended = 1');

        return true;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function addPhotoAlbum($album) {

        $inCore     = cmsCore::getInstance();

        $album      = cmsCore::callEvent('ADD_USER_PHOTO_ALBUM', $album);

        if (!$album['allow_who']) { $album['allow_who'] = 'all'; }

        $sql = "INSERT INTO cms_user_albums (user_id, title, pubdate, allow_who, description)
                VALUES ({$album['user_id']}, '{$album['title']}', NOW(), '{$album['allow_who']}', '{$album['description']}')";

        $this->inDB->query($sql);

        $album_id = $this->inDB->get_last_id('cms_user_albums');

        return $album_id;
        
    }
	
    public function updatePhotoAlbum($album) {

        if (!$album['allow_who']) { $album['allow_who'] = 'all'; }

		$sql = "UPDATE cms_user_albums
						SET title = '{$album['title']}',
							description = '{$album['description']}',
							allow_who = '{$album['allow_who']}'
						WHERE id = '{$album['id']}'
						LIMIT 1";

        $this->inDB->query($sql);

        return true;
        
    }

    public function getPhotoAlbum($type, $id) {

        $album = array();

        if ($type == 'private'){
            $album = $this->inDB->get_fields('cms_user_albums', "id='{$id}'", 'id, user_id, title, allow_who, description');
        }

        if ($type == 'public'){
            $album = $this->inDB->get_fields('cms_photo_albums', "id='{$id}'", 'id, user_id, title');
        }

        return $album ? $album : false;

    }

    public function getPhoto($id) {

        $photo = $this->inDB->get_fields('cms_user_photos', "id='{$id}'", 'id, user_id, title');

        return $photo ? $photo : false;

    }

    public function getAlbumPhotos($user_id, $album_type, $album_id, $is_friends=false) {

        $inUser     = cmsUser::getInstance();
        $is_my      = $inUser->id == $user_id;
        $is_friends = (int)$is_friends;
        $filter     = '';
        $photos     = array();

        if ($album_type == 'private'){

            if (!$is_my){
                $filter = "AND (
                                    allow_who='all'
                                    OR
                                    (allow_who='registered' AND ({$inUser->id}>0))
                                    OR
                                    (allow_who='friends' AND ({$is_friends}=1))
                                )";
            }

            //�������� ������ ����������
            $private_sql = "SELECT id, pubdate, imageurl as file, hits, title
                            FROM cms_user_photos
                            WHERE user_id = '{$user_id}' AND album_id = '{$album_id}' $filter
                            ORDER BY id DESC";

            $private_res = $this->inDB->query($private_sql);

            if ($this->inDB->num_rows($private_res)) {
                while($photo = $this->inDB->fetch_assoc($private_res)){
                    $photo['file']  = '/images/users/photos/small/'.$photo['file'];
                    $photo['url']   = '/users/'.$user_id.'/photo'.$photo['id'].'.html';
                    $photo['fpubdate'] = cmsCore::dateFormat($photo['pubdate']);
                    $photos[]       = $photo;
                }
            }

        }

        if ($album_type == 'public'){

            //�������� ���������� �� �������
            $public_sql = "SELECT id, pubdate, file, hits, title
                            FROM cms_photo_files
                            WHERE user_id = '{$user_id}' AND album_id = '{$album_id}' AND published = 1";

            $public_res = $this->inDB->query($public_sql);

            if ($this->inDB->num_rows($public_res)) {
                while($photo = $this->inDB->fetch_assoc($public_res)){
                    $photo['file']  = '/images/photos/small/'.$photo['file'];
                    $photo['url']   = '/photos/photo'.$photo['id'].'.html';
                    $photo['fpubdate'] = cmsCore::dateFormat($photo['pubdate']);
                    $photos[]       = $photo;
                }
            }

        }

        return $photos;

    }

    public function getPhotoAlbums($user_id, $is_friends=false, $only_private=false) {

        $inUser     = cmsUser::getInstance();
        $is_my      = $inUser->id == $user_id || $inUser->is_admin;
        $is_friends = (int)$is_friends;
        $filter     = '';
        $albums     = array();
        
        if (!$is_my){
            $filter = "AND (
                                a.allow_who='all'
                                OR
                                (a.allow_who='registered' AND ({$inUser->id}>0))
                                OR
                                (a.allow_who='friends' AND ({$is_friends}=1))
                            )";
        }

        $sql = "SELECT a.id as id,
                       a.title as title,
                       a.pubdate as pubdate,
                       a.allow_who as allow_who,
                       'private' as type,
                       p.imageurl as imageurl,
                       COUNT(p.id) as photos_count
                FROM cms_user_photos p
				INNER JOIN cms_user_albums a ON a.id = p.album_id
                WHERE p.user_id='{$user_id}' {$filter}
                GROUP BY p.album_id";

        $result = $this->inDB->query($sql);

        if ($this->inDB->num_rows($result)) { 
            while($album = $this->inDB->fetch_assoc($result)){
                $album['imageurl'] = "/images/users/photos/small/{$album['imageurl']}";
                $album['pubdate']  = cmsCore::dateFormat($album['pubdate']);
                $albums[] = $album;
            }
        }

        if ($only_private){
            $albums = cmsCore::callEvent('GET_USER_ALBUMS', $albums);
            return $albums;
        }

        $sql = "SELECT  a.id as id,
                        a.title as title,
                        a.pubdate as pubdate,
                        'all' as allow_who,
                        'public' as type,
                        f.file as imageurl,
                        COUNT(f.id) as photos_count
                FROM cms_photo_files f
				LEFT JOIN cms_photo_albums a ON a.id = f.album_id
                WHERE f.user_id='{$user_id}' AND f.published = 1
                GROUP BY f.album_id";

        $result = $this->inDB->query($sql);

        if ($this->inDB->num_rows($result)) {
            while($album = $this->inDB->fetch_assoc($result)){
                $album['imageurl'] = "/images/photos/small/{$album['imageurl']}";
                $album['pubdate']  = cmsCore::dateFormat($album['pubdate']);
                $albums[] = $album;
            }
        }

        $albums = cmsCore::callEvent('GET_USER_ALBUMS', $albums);

        return $albums;

    }

    public function addUploadedPhoto($user_id, $photo) {

        $photo['filename'] = iconv('utf-8', 'cp1251', $photo['filename']);

        $sql = "INSERT INTO cms_user_photos (user_id, album_id, pubdate, title, description, allow_who, hits, imageurl)
                VALUES('{$user_id}', '0', NOW(), '{$photo['filename']}', '', 'none', 0, '{$photo['imageurl']}')";

        $this->inDB->query($sql);

        return true;

    }

    public function getUploadedPhotos($user_id) {

        $photos = array();

        if (cmsUser::sessionGet('photos_list')){
            $sess_ids = 'id IN ('.rtrim(implode(',', cmsUser::sessionGet('photos_list')), ',').')';
        } else {
            $sess_ids = '1=0';
        }

        $sql = "SELECT id, user_id, album_id, title, description, allow_who, imageurl
                FROM cms_user_photos
                WHERE user_id='{$user_id}' AND (album_id = 0 OR ({$sess_ids}))";

        $result = $this->inDB->query($sql);

        if ($this->inDB->num_rows($result)) {
            while($photo = $this->inDB->fetch_assoc($result)){
                $photos[$photo['id']] = $photo;
            }
        }

        $photos = cmsCore::callEvent('GET_USER_UPLOADED_PHOTOS', $photos);

        return $photos ? $photos : false;

    }

    public function deletePhoto($photo_id) {

        $inCore = cmsCore::getInstance();

        $inCore->loadLib('tags');

        $sql = "SELECT imageurl FROM cms_user_photos WHERE id = '{$photo_id}'";
        $result = $this->inDB->query($sql);
        
        if ($this->inDB->num_rows($result)){
            $photo = $this->inDB->fetch_assoc($result);
            @unlink(PATH.'/images/users/photos/'.$photo['imageurl']);
            @unlink(PATH.'/images/users/photos/small/'.$photo['imageurl']);
            @unlink(PATH.'/images/users/photos/medium/'.$photo['imageurl']);
            $this->inDB->query("DELETE FROM cms_user_photos WHERE id = $photo_id") ;
            $inCore->deleteComments('userphoto', $photo_id);
			cmsActions::removeObjectLog('add_user_photo', $photo_id);
            cmsClearTags('userphoto', $photo_id);
        }

        return true;

    }

    public function deletePhotoAlbum($user_id, $album_id) {

        $inUser = cmsUser::getInstance();

        $photos = $this->getAlbumPhotos($user_id, 'private', $album_id);

        if ($photos){
            foreach($photos as $photo){
                $this->deletePhoto($photo['id']);
            }
        }

		cmsActions::removeTargetLog('add_user_photo_multi', $album_id);

        $this->inDB->query("DELETE FROM cms_user_albums WHERE id = '$album_id'") ;

        return true;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function deleteInactiveUsers() {

		$inCore = cmsCore::getInstance();

		$inCore->loadClass('actions');

		$cfg    = $inCore->loadComponentConfig('users');

		$month  = $cfg['deltime'] ? $cfg['deltime'] : 6;

        $users_list = $this->inDB->get_table('cms_users', "DATE_SUB(NOW(), INTERVAL $month MONTH) > logdate", 'id');

        foreach($users_list as $usr){
            $this->deleteUser($usr['id'], true);
        }

        return true;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function deleteOldNotification() {

		$this->inDB->query("DELETE FROM cms_user_msg WHERE from_id IN (-1, -2) AND is_new =0 AND DATE_SUB(NOW(), INTERVAL 1 MONTH) > senddate");

        return true;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function clearUploadedPhotos() {

        $photos = array();

        $sql = "SELECT id
                FROM cms_user_photos
                WHERE album_id = 0 OR allow_who = 'none'
                ORDER BY id ASC";

        $result = $this->inDB->query($sql);

        if ($this->inDB->num_rows($result)) {
            while($photo = $this->inDB->fetch_assoc($result)){
                $this->deletePhoto($photo['id']);
            }
        }

        return true;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function sendNotificationByEmail($to_id=0, $from_id=0, $msg_id=0) {

		if(!$from_id || !$to_id || !$msg_id) { return false; }

		$inUser = cmsUser::getInstance();
		$inCore = cmsCore::getInstance();
		$inConf = cmsConfig::getInstance();

		global $_LANG;

		//��������� �������� �� �����������
		$needmail = $this->inDB->get_field('cms_user_profiles', "user_id='{$to_id}'", 'email_newmsg');

		//���� �������� � �� ������, ���������� ����������� �� email
		if (!$inUser->isOnline($to_id) && $needmail){

			$postdate   = date('d/m/Y H:i:s');
			$to_email   = $this->inDB->get_field('cms_users', "id='{$to_id}'", 'email');
			$from_nick  = $inUser->nickname;
			$answerlink = HOST.'/users/'.$from_id.'/reply'.$msg_id.'.html';

			$letter_path    = PATH.'/includes/letters/newmessage.txt';
			$letter         = file_get_contents($letter_path);

			$letter= str_replace('{sitename}', $inConf->sitename, $letter);
			$letter= str_replace('{answerlink}', $answerlink, $letter);
			$letter= str_replace('{date}', $postdate, $letter);
			$letter= str_replace('{from}', $from_nick, $letter);
			$inCore->mailText($to_email, $_LANG['YOU_HAVE_NEW_MESS'].'! - '.$inConf->sitename, $letter);
			
			return true;
		}

        return false;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

}