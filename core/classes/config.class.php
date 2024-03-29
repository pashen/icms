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

class cmsConfig {

    private static $instance;

    private function __construct(){
        
		mb_internal_encoding("cp1251");
        
        $cfg_file = PATH.'/includes/config.inc.php';

        //defaults
        $this->db_prefix    = 'cms';
        $this->homecom      = '';
        $this->timezone     = 'Europe/Moscow';
        $this->timediff     = '0';

        if (file_exists($cfg_file)){
        
            include($cfg_file);

            foreach ($_CFG as $id=>$value) {
                $this->{$id} = $value;
            }

        }

		date_default_timezone_set($this->timezone);

		setlocale(LC_ALL, "ru_RU.CP1251");

        return true;
        
	}

    private function __clone() {}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }        
        return self::$instance;
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * ��������� ������ � ���� ������������
     * @param array $_CFG
     */
    public function saveToFile($_CFG, $file='config.inc.php'){
        
        $filepath = PATH.'/includes/'.$file;

        if (file_exists($filepath)){
            if (!@is_writable($filepath)){ die('���� <strong>'.$filepath.'</strong> ���������� ��� ������!'); }
        } else {
            if (!@is_writable(dirname($filepath))){ die('����� <strong>'.dirname($filepath).'</strong> ���������� ��� ������!'); }
        }

        $cfg_file = fopen($filepath, 'w+');

        fputs($cfg_file, "<?php \n");
        fputs($cfg_file, "if(!defined('VALID_CMS')) { die('ACCESS DENIED'); } \n");
        fputs($cfg_file, '$_CFG = array();'."\n");

        foreach($_CFG as $key=>$value){
            if (is_int($value)){
                $s = '$_CFG' . "['$key'] \t= $value;\n";
            } else {
                $s = '$_CFG' . "['$key'] \t= '$value';\n";
            }
            fwrite($cfg_file, $s);
        }

        fwrite($cfg_file, "?>");
        fclose($cfg_file);

        return true;
        
    }
    	
}

?>