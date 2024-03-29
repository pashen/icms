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

class cmsPage {

    public $title       = '';
    public $back_button = true;

    public $page_head   = array();
    public $page_keys   = '';
    public $page_desc   = '';
    public $page_body   = '';

    public $pathway     = array();

    public $captcha_count = 1;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    private static $instance;

    private function __construct() {
        $this->title = $this->homeTitle();
    }

    private function __clone() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ��������� ��������� ��� � <head> ��������
 * @param string $tag
 * @return true
 */
public function addHead($tag){
    $this->page_head[] = $tag;
    return true;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ��������� ��� <script> � ��������� �����
 * @param string $src - ������ ���� �� ���������
 * @return true
 */
public function addHeadJS($src){

    $js_tag = '<script language="JavaScript" type="text/javascript" src="/'.$src.'"></script>';

    if (!in_array($js_tag, $this->page_head)){ $this->page_head[] = $js_tag; }

    return true;

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ��������� ��� <link> � ��������� ����� � CSS-�����
 * @param string $src - ������ ���� �� ���������
 * @return true
 */
public function addHeadCSS($src){

    $css_tag = '<link href="/'.$src.'" rel="stylesheet" type="text/css" />';

    if (!in_array($css_tag, $this->page_head)){ $this->page_head[] = $css_tag; }
    
    return true;

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ���������� ��������� ������� ��������
 * @global array $_CFG
 * @return string
 */
public function homeTitle(){
    $inConf = cmsConfig::getInstance();
    if (isset($inConf->hometitle)) { 
        if ($inConf->hometitle) { return $inConf->hometitle; }
        else { return $inConf->sitename; }
    }
    else { return $inConf->sitename; }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ������������� ��������� ��������
 */
public function setTitle($title=''){
    $this->title = $title;
    return true;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ������� ��������� h1 �� ��������
 */
public function printHeading($heading=''){
    echo '<h1 class="con_heading">'.htmlspecialchars($heading).'</h1>';
    return true;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ������������� �������� ����� ��������
 */
public function setKeywords($keywords){
    $this->page_keys = $keywords;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ������������� �������� ��������
 */
public function setDescription($text){
    $this->page_desc = $text;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * �������� �������� ����� �� �������
 * @return true
 */
public function printSitename(){
    require('includes/config.inc.php');
    echo $_CFG['sitename'];
    return true;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ��������/��������� ����� ������ "�����" ����� ��������
 * @return true
 */
public function backButton($show=true){
    $this->back_button = (bool)$show;
    return true;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * �������� �������� ������� ��������
 */
public function printHead(){

    $inCore = cmsCore::getInstance();
    $inConf = cmsConfig::getInstance();

    $this->page_head = cmsCore::callEvent('PRINT_PAGE_HEAD', $this->page_head);

    ob_start();
    
    //���������
    $title = strip_tags($this->title);
    $title = ($inCore->menuId()==1 ? $this->homeTitle() : $title.' - '.$inConf->sitename);
    echo '<title>'.htmlspecialchars($title).'</title>' ."\n";
    //�������� �����
    if (!$this->page_keys) { $this->page_keys = $inConf->keywords; }
    echo '<meta name="keywords" content="'.htmlspecialchars($this->page_keys).'" />' ."\n";
    //��������
    if (!$this->page_desc) { $this->page_desc = $inConf->metadesc; }
    echo '<meta name="description" content="'.htmlspecialchars($this->page_desc).'" />' ."\n";
    //���������
    echo '<meta name="generator" content="InstantCMS - www.instantcms.ru"/>' ."\n";

    //jQuery ����������
    echo '<script type="text/javascript" src="/includes/jquery/jquery.js"></script>' ."\n";
    //JS-������� ����
    echo '<script type="text/javascript" src="/core/js/common.js"></script>' ."\n";

    //��������� JS-�����
    foreach($this->page_head as $key=>$value) {
        if(strstr($this->page_head[$key], '<script')) {
            echo $this->page_head[$key] ."\n"; unset($this->page_head[$key]);
        }
    }

    //CSS-�����
    foreach($this->page_head as $key=>$value) {
        if(strstr($this->page_head[$key], '<link')) {
            echo $this->page_head[$key] ."\n"; unset($this->page_head[$key]);
        }
    }

    //���������� ����
    foreach($this->page_head as $key=>$value) { echo $this->page_head[$key] ."\n"; }
    
    echo ob_get_clean();

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * �������� ������ ��������
 * @global array $_CFG
 */
public function printFooter(){
    global $_CFG;
    $currentYear = date('Y');
    echo '<div id="footer" align="center"><a href="/" title="'.$_CFG['sitename'].'">'.$_CFG['sitename'].'</a> &copy; '.$currentYear;
        echo '<br/>';
        echo '���� �������� �� <a href="http://www.instantcms.ru/">InstantCMS</a> v'.CORE_VERSION.'<br/>';
    echo '<div>';
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ������� ���� �������� (��������� ������ ����������)
 * @global array $_CFG
 */
public function printBody(){
    global $_CFG;
    if ($_CFG['slight']){
		$searchquery = cmsUser::sessionGet('searchquery');
        if ($searchquery){
            if ($_REQUEST['view']!='search'){
                $this->page_body = str_ireplace($searchquery, '<span class="search_match">'.$searchquery.'</span>', $this->page_body);
                cmsUser::sessionDel('searchquery');
            }
        }
    }

    $this->page_body = cmsCore::callEvent('PRINT_PAGE_BODY', $this->page_body);

    echo $this->page_body;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * �������� ����������
 * @param string $separator
 */
public function printPathway($separator='&rarr;'){

    $inCore = cmsCore::getInstance();
    $inConf = cmsConfig::getInstance();

    //���������, �� ������� �� ��� ���
    if (($inCore->menuId()==1 && !$inConf->index_pw) || !$inConf->show_pw) { return false; }

    if ($inConf->short_pw){ unset($this->pathway[sizeof($this->pathway)-1]); }
    
    if (is_array($this->pathway)){
        echo '<div class="pathway">';
        foreach($this->pathway as $key => $value){
            echo '<a href="'.$this->pathway[$key]['link'].'" class="pathwaylink">'.$this->pathway[$key]['title'].'</a> ';
            if ($key<sizeof($this->pathway)-1) {
                echo ' '.$separator.' ';
            }
        }
        echo '</div>';
    }

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ��������� ����� � �����������
 * @param string $title
 * @param string $link
 * @return bool
 */
public function addPathway($title, $link=''){
    //���� ������ �� �������, ����� ������� URI
    if (empty($link)) { $link = $_SERVER['REQUEST_URI']; }
    //���������, ���� �� ��� � ����������� ����� �����
    $already = false;
    foreach($this->pathway as $key => $val){
        if ($this->pathway[$key]['link'] == $link){
            $already = true;
        }
    }
    //���� ������ ����� ��� ���, ��������� ���
    if(!$already){
        $this->pathway[] = array('title'=>$title, 'link'=>$link);
    }
    return true;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ��������� � ����������� ���� �� ���������� ������ ����
 * @param int $menuid
 */
public function addMenuPathway($menuid){

    $inCore = cmsCore::getInstance();
    $inDB   = cmsDatabase::getInstance();

    //�������� ���� � ������ ����
    $rs_item = $inDB->query("SELECT NSLeft, NSRight FROM cms_menu WHERE id = '$menuid'");

    if ($inDB->num_rows($rs_item)){
        $current_item   = $inDB->fetch_assoc($rs_item);
        
        $left_key       = $current_item['NSLeft'];
        $right_key      = $current_item['NSRight'];

        $sql            = "SELECT id, title, link, linktype
                           FROM cms_menu
                           WHERE NSLeft <= $left_key AND NSRight >= $right_key AND parent_id > 0
                           ORDER BY NSLeft";

        $rs_rows = $inDB->query($sql);

        while($item=$inDB->fetch_assoc($rs_rows)){
            if ($item['id']>1){
                $this->addPathway($item['title'], $inCore->menuSeoLink($item['link'], $item['linktype'], $item['id']));
            }
        }        
    }

    return true;

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ������� �� ����� ������ �����
 * ����� ������ ������ �������� ���������� ��������� TEMPLATE � TEMPLATE_DIR
 * ��� ��������� �������� � ����� /index.php
 */
public function showTemplate(){

    $inCore = cmsCore::getInstance();

    $menu_template = $inCore->menuTemplate($inCore->menuId());

    if ($menu_template && file_exists(PATH.'/templates/'.$menu_template.'/template.php')){
        require(PATH.'/templates/'.$menu_template.'/template.php');
        return;
    }

    if (file_exists(TEMPLATE_DIR.'template.php')){
        require(TEMPLATE_DIR.'template.php');
        return; 
    }
    
    $inCore->halt('������ "'.TEMPLATE.'" �� ������.');

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ���������� ���� �� ����� � ��������
 * ���� � ����� �������� ������� ����� ���� �� ������, ���� � ���������
 * @param string $file, �������� "special/error404.html"
 * @return <type>
 */
public function includeTemplateFile($file){

    if (file_exists(TEMPLATE_DIR.$file)){
        include(TEMPLATE_DIR.$file);
        return true;
    }

    if (file_exists(DEFAULT_TEMPLATE_DIR.$file)){
        include(DEFAULT_TEMPLATE_DIR.$file);
        return true;
    }

    return false;

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function showSplash(){

    $inCore = cmsCore::getInstance();

    if ($this->includeTemplateFile('splash/splash.php')){

        $inCore->setCookie('splash', md5('splash'), time()+60*60*24*30);
        $_SESSION['splash'] = 1;
        return true;
        
    }

    return false;

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function countModules($position){

    $inCore = cmsCore::getInstance();
    $inDB   = cmsDatabase::getInstance();
	
    if (!$inCore->isMenuIdStrict()){ $strict_sql = "AND (m.is_strict_bind = 0)"; } else { $strict_sql = ""; }

	$menuid = $inCore->menuId();

    $sql = "SELECT m.access_list
            FROM cms_modules m, cms_modules_bind mb
            WHERE mb.position = '$position' AND
                  m.published = 1 AND
                  m.id = mb.module_id AND
                  (mb.menu_id = '$menuid' OR mb.menu_id = 0)
                  $strict_sql
            ";

	$result = $inDB->query($sql);

    if (!$inDB->num_rows($result)){ return 0; }
	
	$mods = array();

    while($mod = $inDB->fetch_assoc($result)){

		// ��������� ����� �������
		if (!$inCore->checkContentAccess($mod['access_list'])) { continue; }
		$mods[] = $mod;
		
	}

    return sizeof($mods);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ������� ������ ��� ��������� ������� � �������� ������ ����
 * @param string $position
 * @return html
 */
public function printModules($position){

    $inCore = cmsCore::getInstance();
    $inDB   = cmsDatabase::getInstance();
    $inUser = cmsUser::getInstance();

    global $_CFG;
    global $_LANG;

    //�������� id ������ ����
    $menuid = $inCore->menuId();

    // ��������� �������
    if (!$position) { return false; }
    if ($position=='top' && @$_REQUEST['view']=='search') { return true; }

    if (!$inCore->isMenuIdStrict()){ $strict_sql = "AND (m.is_strict_bind = 0)"; } else { $strict_sql = ""; }

    // �������� ��� ������ �� �������
    $sql = "SELECT *, m.id as mid, m.template as tpl
            FROM cms_modules m, cms_modules_bind mb
            WHERE (mb.position = '$position') AND
                  m.published = 1 AND
                  m.id = mb.module_id AND
                  (mb.menu_id = '$menuid' OR mb.menu_id = 0)
                  $strict_sql
            ORDER BY m.ordering ASC
            ";

    $result = $inDB->query($sql);

    if(!$inDB->num_rows($result)){ return false; }

	while ($mod = $inDB->fetch_assoc($result)){
		
		// ��������� ����� �������
		if (!$inCore->checkContentAccess($mod['access_list'])) { continue; }
		
		$modulefile = PATH.'/modules/'.$mod['content'].'/module.php';

		if (!$mod['user']) { cmsCore::loadLanguage('modules/'.$mod['content']); }
		
		if( !$mod['is_external'] ){
				//PROCESS FILTERS
				$filters = $inCore->getFilters();
				if ($filters){
					foreach($filters as $id=>$_data){
						require_once 'filters/'.$_data['link'].'/filter.php';
						$_data['link']($mod['content']);
					}
				}
				$callback = true;
				$modulebody = $mod['content'];
		}

		if( $mod['is_external'] ){
			if (file_exists($modulefile)){
				//load module file
				require_once $modulefile;
				//run module and get its output to $modulebody

				if ($mod['cache'] && $inCore->isCached('module', $mod['mid'], $mod['cachetime'], $mod['cacheint'])){

					$modulebody = $inCore->getCache('module', $mod['mid']);
					$callback = true;

				} else {

					$config = $inCore->yamlToArray($mod['config']);
					$inCore->cacheModuleConfig($mod['module_id'], $config);

					ob_start();
					$callback = $mod['content']($mod['module_id']);
					$modulebody = ob_get_clean();
					if($mod['cache']) { $inCore->saveCache('module', $mod['mid'], $modulebody); }
				}

			}
		}

		if ( $callback ){ //if module returns TRUE
			$module             = array();
			$mod['body']        = $modulebody;
			$smarty             = $inCore->initSmartyModule();
			$_CFG['fastcfg']    = isset($_CFG['fastcfg']) ? $_CFG['fastcfg'] : 0;
			
			if ($_CFG['fastcfg'] && $inCore->userIsAdmin($inUser->id)){
				$smarty->assign('cfglink', '/admin/index.php?view=modules&do=edit&id='.$mod['mid']);
			}

			$smarty->assign('mod', $mod);

			$module_tpl = file_exists($smarty->template_dir.'/'.$mod['tpl']) ? $mod['tpl'] : 'module.tpl';

			$smarty->display($module_tpl);
		}

	}//while

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ���������� html-��� ������
 * @param string $input_name
 * @return html
 */
public static function getCaptcha($input_name='code'){
    ob_start();
    $captcha_count = self::getInstance()->captcha_count;
    $input_id = 'kcaptcha' . $captcha_count;
    ?>
        <table>
            <tr>
                <td valign="middle" width="130"><img id="<?php echo $input_id; ?>" class="captcha" src="/includes/codegen/cms_codegen.php" border="0" /></td>
                <td valign="middle">
                    <div>������� ���:</div>
                    <div><input name="<?php echo $input_name; ?>" type="text" style="width:120px" /></div>
                    <div><a href="javascript:reloadCaptcha('<?php echo $input_id;  ?>')"><small>�������� ��������</small></a></div>
                </td>
            </tr>
        </table>
    <?php
    self::getInstance()->captcha_count += 1;
    return ob_get_clean();
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ���������� � ��������� html-��� ��������� ����� �� ������������ ����
 * @param int $form_id
 * @param bool $admin
 * @param bool $showtitle
 * @return html
 */
public function buildForm($form_id, $admin=false, $showtitle=true){

    $inDB = cmsDatabase::getInstance();

    $html = '';

    //GET FORM DATA
    $sql    = "SELECT * FROM cms_forms WHERE id = '$form_id' LIMIT 1";
    $result = $inDB->query($sql) ;

    if (!$inDB->num_rows($result)) { return false; }

	$form = $inDB->fetch_assoc($result);
	//BUILD FORM
	if ($showtitle) { $html .= '<h3 class="userform_title">'.$form['title'].'</h3>'; }
	if($form['description']) { $html .= '<p>'.$form['description'].'</p>'; }

	$html .= '<form name="userform" id="userform" action="/forms/process" method="POST">';
	$html .= '<input type="hidden" name="form_id" value="'.$form_id.'">';

	//GET FIELDS DATA
	$sql = "SELECT * FROM cms_form_fields WHERE form_id = '$form_id' ORDER BY ordering ASC";
	$result = $inDB->query($sql) ;

	if ($inDB->num_rows($result)){
		//BUILD FORM FIELDS
		$html .= '<table class="userform_table">';
		while($field = $inDB->fetch_assoc($result)){
			$html .= '<tr><td class="userform_fieldtitle">';
				if ($admin) { $html .= '[<font color="gray">'.$field['ordering'].'</font>] '; }
				$html .= $field['title'];
				if ($field['mustbe']) { $html .= '<span style="color:red;font-size:20px">*</span>'; }
				if($admin) {
					$html .= '<a href="?view=components&do=config&id='.$_REQUEST['id'].'&opt=del_field&form_id='.$form_id.'&item_id='.$field['id'].'" title="�������"><img src="/admin/images/actions/delete.gif" border="0" /></a>';
					$html .= '<a href="?view=components&do=config&id='.$_REQUEST['id'].'&opt=up_field&form_id='.$form_id.'&item_id='.$field['id'].'" title="����������� �����"><img src="/admin/images/actions/top.gif" border="0" /></a>';
					$html .= '<a href="?view=components&do=config&id='.$_REQUEST['id'].'&opt=down_field&form_id='.$form_id.'&item_id='.$field['id'].'" title="����������� ����"><img src="/admin/images/actions/down.gif" border="0" /></a>';
				}
			$html .= '</td></tr>';
			$html .= '<tr><td>'.$this->buildFormField($form_id, $field).'</td></tr>';
		}
		if (!$admin){
			//CAPTCHA
			$html .= '<tr><td>';
				$html .= cmsPage::getCaptcha();
			$html .= '</td></tr>';
			//Submit buttons
			$html .= '<tr><td><div style="margin-top:10px">';
				$html .= '<input type="submit" value="���������" /> ';
				$html .= '<input type="reset" value="��������" />';
			$html .= '</div></td></tr>';
		}
		$html .= '</table>';

	} else { $html .= '<p>� ����� ��� �����.</p>'; }

	$html .= '</form>';

	if(cmsUser::sessionGet('form_last_'.$form_id)) { cmsUser::sessionDel('form_last_'.$form_id); }

    return $html;

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ���������� � ��������� html-��� ���� �����
 * @param array $field
 * @param string $default
 * @return html
 */
public function buildFormField($form_id, $field, $default=''){

    $html   = '';
    $cfg    = unserialize($field['config']);

    $style  = 'background-color:white';

	$ses_value = cmsUser::sessionGet('form_last_'.$form_id.'_'.$field['id']);

	if ($ses_value){
		$cfg['default'] = $ses_value;
		cmsUser::sessionDel('form_last_'.$form_id.'_'.$field['id']);
	}

    if ($default){
        $cfg['default'] = $default;
    }

    switch($field['kind']){
        case 'text': $html .= '<input type="text"
                                      name="field['.$field['id'].']"
                                      maxlength="'.$cfg['max'].'"
                                      size="'.$cfg['size'].'"
                                      value="'.htmlspecialchars($cfg['default']).'"
                                      style="'.$style.'"
                                      class="text-input"
                                      />';
                     break;
        case 'textarea': $html .= '<textarea name="field['.$field['id'].']"
                                             class="text-input"
                                             maxlength="'.$cfg['max'].'"
                                             cols="'.$cfg['size'].'"
                                             rows="'.$cfg['rows'].'" style="'.$style.'">'.htmlspecialchars($cfg['default']).'</textarea>';
                         break;
        case 'checkbox':  $html .= '<label><input type="radio" name="field['.$field['id'].']" value="��" ';
                          if($cfg['default']=='��') { $html .= 'checked'; }
                          $html .= '/>��</label> ';
                          $html .= '<label><input type="radio" name="field['.$field['id'].']" value="���" ';
                          if($cfg['default']=='���') { $html .= 'checked'; }
                          $html .= '/>���</label> ';
                         break;
        case 'radiogroup': $items = explode('/', $cfg['items']);
                           foreach($items as $i){
                                $i = str_replace('_', ' ', $i);
                               $html .= '<label><input type="radio" name="field['.$field['id'].']" value="'.$i.'" ';
                               if($i == @$cfg['default']) { $html .= 'checked'; }
                               $html .= ' />'.$i.'</label><br/>';
                           }
                         break;
        case 'list': $items = explode('/', $cfg['items']);
                     $html .= '<select style="'.$style.'" name="field['.$field['id'].']">';
                     foreach($items as $i){
                          $i = str_replace('_', ' ', $i);
                          $html .= '<option value="'.htmlspecialchars($i).'"';
                          if($i == @$cfg['default']) { $html .= 'selected'; }
                          $html .= ' >'.$i.'</option>';
                     }
                     $html .= '</select>';
                     break;
        case 'menu': $items = explode('/', $cfg['items']);
                     $html .= '<select style="'.$style.'" name="field['.$field['id'].']" size="8">';
                     foreach($items as $i){
                          $i = str_replace('_', ' ', $i);
						  if($i == @$cfg['default']) { $sel = 'selected'; } else { $sel = ''; }
                          $html .= '<option value="'.htmlspecialchars($i).'" '.$sel.'>'.$i.'</option>';
                     }
                     $html .= '</select>';
                     break;
    }
    return $html;

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ��������� ����� �� ����� � ������ ������ ����� �������, �������� � ��� ������ $link
 * @param string $link
 * @param string $text
 * @return html
 */
public static function getMetaSearchLink($link, $text){
    $html='';
    $text = strip_tags($text);
    $text = trim($text);
    if (!strstr($text, ',')){
        $html .= '<a href="'.$link.urlencode($text).'">'.$text.'</a>';
    } else {
        $text = str_replace(', ', ',', $text);
        $text = str_replace('&nbsp;', '', $text);
        $text = str_replace('&#8217;', "'", $text);
        $text = str_replace('&quot;', '"', $text);
        $words = array();
        $words = explode(',', $text);

        $n=0;
        foreach($words as $key=>$value){
            $n++;
            $value = strip_tags($value);
            $value = str_replace("\r", '', $value);
            $value = str_replace("\n", '', $value);
            $value = trim($value, ' .');
            $html .= '<a href="'.$link.urlencode($value).'">'.$value.'</a>';
            if ($n<sizeof($words)) { $html .= ', '; } else { $html .= '.'; }
        }

    }

    return $html;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ���������� html-��� ������ ��� ������� BBCode
 * @param string $field_id
 * @param bool $images
 * @param string $placekind
 * @return html
 */
public static function getBBCodeToolbar($field_id, $images=0, $placekind='forum'){

    $inCore = cmsCore::getInstance();
    $inPage = cmsPage::getInstance();
    $inUser = cmsUser::getInstance();

    $inPage->addHeadJS('core/js/smiles.js');
    $inPage->addHeadJS('includes/jquery/upload/ajaxfileupload.js');

    $html = '<a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[b]\', \'[/b]\')" title="������">
                <img src="/includes/bbcode/images/b.png" border="0" alt="������" />
             </a>
             <a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[i]\', \'[/i]\')" title="������">
                <img src="/includes/bbcode/images/i.png" border="0" alt="������" />
             </a>
             <a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[u]\', \'[/u]\')"  title="������������">
                <img src="/includes/bbcode/images/u.png" border="0" alt="������������" />
             </a>
             <a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[s]\', \'[/s]\')"  title="�����������">
                <img src="/includes/bbcode/images/s.png" border="0" alt="�����������" />
             </a>
             <a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[align=left]\', \'[/align]\')" title="�� ������ ����">
                <img src="/includes/bbcode/images/align_left.png" border="0" alt="�� ������ ����" />
             </a>
             <a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[align=center]\', \'[/align]\')" title="�� ������">
                <img src="/includes/bbcode/images/align_center.png" border="0" alt="�� ������" />
             </a>
             <a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[align=right]\', \'[/align]\')" title="�� ������� ����">
                <img src="/includes/bbcode/images/align_right.png" border="0" alt="�� ������� ����" />
             </a>
             <a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[h2]\', \'[/h2]\')" title="������� ���������">
                <img src="/includes/bbcode/images/h2.png" border="0" alt="������� ���������" />
             </a>
             <a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[h3]\', \'[/h3]\')" title="��������� ���������">
                <img src="/includes/bbcode/images/h3.png" border="0" alt="��������� ���������" />
             </a>
             <a class="usr_bb_button" href="javascript:addTagQuote(\''.$field_id.'\')" title="������">
                <img src="/includes/bbcode/images/quote.png" border="0" alt="������" />
             </a>
             <a class="usr_bb_button" href="javascript:addTagUrl(\''.$field_id.'\')" title="�������� ������">
                <img src="/includes/bbcode/images/url.png" border="0" alt="�������� ������" />
             </a>
             <a class="usr_bb_button" href="javascript:addTagEmail(\''.$field_id.'\')" title="�������� email">
                <img src="/includes/bbcode/images/email.png" border="0" alt="�������� email" />
             </a>
             <a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[code=php]\', \'[/code]\')" title="�������� ���">
                <img src="/includes/bbcode/images/code.png" border="0" alt="�������� ���" />
             </a>
             <a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[hide]\', \'[/hide]\')" title="�������� ������� �����">
                <img src="/includes/bbcode/images/hide.png" border="0" alt="�������� ������� �����" />
             </a>
             <a class="usr_bb_button" href="javascript:addTag(\''.$field_id.'\', \'[spoiler=�������]\', \'[/spoiler]\')" title="�������� �������">
                <img src="/includes/bbcode/images/spoiler.png" border="0" alt="�������� �������" />
             </a>
             <a class="usr_bb_button" href="javascript:void(0)" onclick="$(\'#smilespanel\').slideToggle(\'slow\')" title="�������� �����">
                <img src="/includes/bbcode/images/smiles.png" border="0" alt="�������� �����" />
             </a>';

    if ($placekind=='blogs'){

        $html .= '<a class="usr_bb_button" href="javascript:addTagCut(\''.$field_id.'\')" title="�������� ����� ������ (���)">
                    <img src="/includes/bbcode/images/cut.png" border="0" alt="�������� ����� ������ (���)" />
                  </a>';

    }

    if ($images){
        $html .= '<a class="usr_bb_button" href="javascript:addTagVideo(\''.$field_id.'\')" title="�������� �����">
                    <img src="/includes/bbcode/images/video.png" border="0" alt="�������� �����" />
                 </a>
                 <a class="usr_bb_button" href="javascript:addTagAudio(\''.$field_id.'\')" title="�������� mp3">
                    <img src="/includes/bbcode/images/audio.png" border="0" alt="�������� mp3" />
                 </a>
                 <a class="usr_bb_button" href="javascript:addTagImage(\''.$field_id.'\')" title="�������� �������� �� ����">
                    <img src="/includes/bbcode/images/image_link.png" border="0" alt="�������� �������� �� ����" />
                 </a>';
		if ($inUser->id) {
			
			$users_cfg = $inCore->loadComponentConfig('users');

			if ($users_cfg['sw_photo']){
				$html .= '<a class="usr_bb_button" href="javascript:addAlbumImage()" title="�������� ���� �� ������ ��������">
							<img src="/includes/bbcode/images/albumimage.png" border="0" alt="�������� ���� �� ������ ��������" />
						 </a>';
			}

			$html .= '<a class="usr_bb_button" href="javascript:addImage(\''.$field_id.'\')" title="��������� � �������� ����">
						<img src="/includes/bbcode/images/image.png" border="0" alt="��������� � �������� ����" />
					 </a>
					 <div class="usr_bb_button" id="imginsert" style="display:none">
						<strong>��������� ����:</strong> <input type="file" id="attach_img" name="attach_img"/>
						 <input type="button" name="goinsert" value="��������" onclick="loadImage(\''.$field_id.'\', \''.session_id().'\', \''.$placekind.'\')" />
					 </div>
					 <div class="usr_bb_button" id="imgloading" style="display:none">
						�������� �����������...
					 </div>';
			if ($users_cfg['sw_photo']){
				$html .= '<div class="usr_bb_button" id="albumimginsert" style="display:none">
						<strong>�������� ����:</strong> '.cmsUser::getPhotosList($inUser->id).'
						 <input type="button" name="goinsert" value="��������" onclick="insertAlbumImage(\''.$field_id.'\')" />
					 </div>';
			}
    	}
    }
	
	$html = cmsCore::callEvent('GET_BBCODE_BUTTON', $html);

    return $html;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ���������� html-��� ������ �� ��������
 * @param string $for_field_id
 * @return html
 */
public static function getSmilesPanel($for_field_id){
    $html = '<div class="usr_msg_smilebox" id="smilespanel" style="display:none">';
    if ($handle = opendir(PATH.'/images/smilies')) {
        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..' && strstr($file, '.gif')){
             $tag = str_replace('.gif', '', $file);
             $dir = '/images/smilies/';

             $html .= '<a href="javascript:addSmile(\''.$tag.'\', \''.$for_field_id.'\');"><img src="'.$dir.$file.'" border="0" /></a> ';
            }
        }

        closedir($handle);
    }
    $html .= '</div>';
    return $html;
}

// AUTOCOMPLETE PLUGIN  /////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ���������� JS � CSS ��� ������������
 */
public function initAutocomplete(){
    $this->addHeadJS('includes/jquery/autocomplete/jquery.autocomplete.min.js');
    $this->addHeadCSS('includes/jquery/autocomplete/jquery.autocomplete.css');
}

/**
 * ���������� JS-��� ������������� ������������ ��� ���������� ���� ����� � �������
 * @param string $script
 * @param string $field_id
 * @param bool $multiple
 * @return js
 */
public function getAutocompleteJS($script, $field_id='tags', $multiple=true){
    $multiple = $multiple ? 'true' : 'false';
    return '$("#'.$field_id.'").autocomplete(
                "/core/ajax/'.$script.'.php",
                {
                    width: 280,
                    selectFirst: false,
                    multiple: '.$multiple.'
                }
            );';
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * ���������� ��� ������ ��� ������������ ���������
 * @param int $total
 * @param int $page
 * @param int $perpage
 * @param string $link
 * @param array $params
 * @return html
 */
public static function getPagebar($total, $page, $perpage, $link, $params=array()){

    global $_LANG;

    $html  = '<div class="pagebar">';
    $html .= '<span class="pagebar_title"><strong>'.$_LANG['PAGES'].': </strong></span>';

    $total_pages = ceil($total / $perpage);

    if ($total_pages < 2) { return; }

    //if more than one page of results
    if($total_pages!=1){

        //configure for the starting links per page
        $max = 4;

        //used in the loop
        $max_links = $max+1;
        $h=1;

        //if page is above max link
        if($page>$max_links){
            //start of loop
            $h=(($h+$page)-$max_links);
        }

        //if page is not page one
        if($page>=1){
            //top of the loop extends
            $max_links = $max_links+($page-1);
        }

        //if the top page is visible then reset the top of the loop to the $total_pages
        if($max_links>$total_pages){
            $max_links=$total_pages+1;
        }

        //next and prev buttons
        if($page>1){

            $href = $link;
            if (is_array($params)){
                foreach($params as $param=>$value){
                    $href = str_replace('%'.$param.'%', $value, $href);
                }
            }
            $html .= ' <a href="'.str_replace('%page%', 1, $href).'" class="pagebar_page">'.$_LANG['FIRST'].'</a> ';
            $html .= ' <a href="'.str_replace('%page%', ($page-1), $href).'" class="pagebar_page">'.$_LANG['PREVIOUS'].'</a> ';

        }

        //create the page links
        for ($i=$h;$i<$max_links;$i++){
            if($i==$page){
                $html .= '<span class="pagebar_current">'.$i.'</span>';
            }
            else{
                $href = $link;
                if (is_array($params)){
                    foreach($params as $param=>$value){
                        $href = str_replace('%'.$param.'%', $value, $href);
                    }
                }
                $href = str_replace('%page%', $i, $href);
                $html .= ' <a href="'.$href.'" class="pagebar_page">'.$i.'</a> ';
            }
        }

        //Next and last buttons
        if(($page >= 1)&&($page!=$total_pages)){
            $href = $link;
            if (is_array($params)){
                foreach($params as $param=>$value){
                    $href = str_replace('%'.$param.'%', $value, $href);
                }
            }
            $html .= ' <a href="'.str_replace('%page%', ($page+1), $href).'" class="pagebar_page">'.$_LANG['NEXT'].'</a> ';
            $html .= ' <a href="'.str_replace('%page%', $total_pages, $href).'" class="pagebar_page">'.$_LANG['LAST'].'</a> ';
        }
    }

    //if one page of results
    else{
        $href = $link;
        if (is_array($params)){
            foreach($params as $param=>$value){
                $href = str_replace('%'.$param.'%', $value, $href);
            }
        }
        $href = str_replace('%page%', 1, $href);
        $html .= ' <a href="'.$href.'" class="pagebar_page">1</a> ';
    }

    $html.='</div>';

    return $html;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public static function getModuleTemplates() {

    $tpl_dir    = is_dir(TEMPLATE_DIR.'modules') ? TEMPLATE_DIR.'modules' : PATH.'/templates/_default_/modules';
    $pdir       = opendir($tpl_dir);

    $templates  = array();

    while ($nextfile = readdir($pdir)){
        if (
                ($nextfile != '.')  &&
                ($nextfile != '..') &&
                !is_dir($tpl_dir.'/'.$nextfile) &&
                ($nextfile!='.svn') &&
                (substr($nextfile, 0, 6)=='module')
           ) {
            $templates[$nextfile] = $nextfile;
        }
    }

    if (!sizeof($templates)){ return false; }

    return $templates;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function siteOffNotify() {
    return '<div style="margin:4px; padding:5px; border:solid 1px red; background:#FFF; position:absolute; z-index:999">
                <strong style="color:red">���� ��������.</strong> 
                ������ �������������� ����� ��� ����������.
            </div>';
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}

?>
