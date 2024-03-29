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

class cmsDatabase {

    private static $instance;

    public $q_count = 0;
    public $q_dump  = '';

    public $db_link;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
private function __construct(){
    $inConf = cmsConfig::getInstance();

    $this->db_link = mysql_connect($inConf->db_host, $inConf->db_user, $inConf->db_pass) or die('Cannot connect to MySQL server');

    mysql_select_db($inConf->db_base, $this->db_link) or die('Cannot select "'.$inConf->db_base.'" database');

    $this->query("SET NAMES cp1251");
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public static function getInstance() {
    if (self::$instance === null) {
        self::$instance = new self;
    }
    return self::$instance;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
protected function replacePrefix( $sql, $prefix='cms_' ) {

    $inConf = cmsConfig::getInstance();
    
    $sql = trim(str_replace($prefix, $inConf->db_prefix.'_', $sql));

    return $sql;
    
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function query($sql, $ignore_errors=false){
    $inConf = cmsConfig::getInstance();
	$sql = $this->replacePrefix($sql);
    $result = mysql_query($sql, $this->db_link);

    if ($inConf->debug){
        $this->q_count  += 1;
        $this->q_dump   .= '<pre>'.$sql.'</pre><hr/>';
    }

    if (mysql_error() && $inConf->debug && !$ignore_errors){
        die('<div style="margin:2px;border:solid 1px gray;padding:10px">DATABASE ERROR: <pre>'.$sql.'</pre>'.mysql_error().'</div>');
    }
    
    return $result;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function num_rows($result){
    return (int)mysql_num_rows($result);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function fetch_assoc($result){
    return mysql_fetch_assoc($result);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function fetch_row($result){
    return mysql_fetch_row($result);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function affected_rows(){
    return mysql_affected_rows($this->db_link);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function get_last_id($table){
    $sql    = "SELECT LAST_INSERT_ID() as lastid FROM $table LIMIT 1";
    $result = $this->query($sql);

    if ($this->num_rows($result)){
        $data = $this->fetch_assoc($result);
        return $data['lastid'];
    } else {
        return 0;
    }    
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function rows_count($table, $where, $limit=0){
    $sql = "SELECT 1 FROM $table WHERE $where";

    if ($limit) { $sql .= " LIMIT ".$limit; }

    $result = $this->query($sql);
    return $this->num_rows($result);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function get_field($table, $where, $field){

    $sql    = "SELECT $field as getfield FROM $table WHERE $where LIMIT 1";
    $result = $this->query($sql);

    if ($this->num_rows($result)){
        $data = $this->fetch_assoc($result);
        return $data['getfield'];
    } else {
        return false;
    }

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function get_fields($table, $where, $fields, $order='id ASC'){

    $sql    = "SELECT $fields FROM $table WHERE $where ORDER BY $order LIMIT 1";
    $result = $this->query($sql);

    if ($this->num_rows($result)){
        $data = $this->fetch_assoc($result);
        return $data;
    } else {
        return false;
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function get_table($table, $where='', $fields='*'){

    $list = array();

    $sql = "SELECT $fields FROM $table";
    if ($where) { $sql .= ' WHERE '.$where; }
    $result = $this->query($sql);

    if ($this->num_rows($result)){
        while($data = $this->fetch_assoc($result)){
            $list[] = $data;
        }
        return $list;
    } else {
        return false;
    }
    
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function errno() {
    return mysql_errno($this->db_link);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function error() {
    return mysql_error($this->db_link);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function escape_string($string) {
    return mysql_real_escape_string($string);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function isFieldExists($table, $field){

    $sql    = "SHOW COLUMNS FROM $table WHERE Field = '$field'";
    $result = $this->query($sql);

    if ($this->errno()) { return false; }

    return (bool)$this->num_rows($result);

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function isFieldType($table, $field, $type){

    $sql    = "SHOW COLUMNS FROM $table WHERE Field = '$field' AND Type = '$type'";
    $result = $this->query($sql);

    if ($this->errno()) { return false; }

    return (bool)$this->num_rows($result);

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function isTableExists($table){

    $sql    = "SELECT 1 FROM $table LIMIT 1";
    $result = $this->query($sql, true);
    
    if ($this->errno()){ return false; }

    return true;

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public static function optimizeTables($tlist=''){

	$inDB = self::getInstance();
    
    if(is_array($tlist)) {
    
		foreach($tlist as $tname) {
		  	$inDB->query("OPTIMIZE TABLE $tname", true);
		  	$inDB->query("ANALYZE TABLE $tname", true);
		}
    
	} else {

		$inConf = cmsConfig::getInstance();
    
		$tlist  = $inDB->get_table('information_schema.tables', "table_schema = '{$inConf->db_base}'", 'table_name');

		if (!is_array($tlist)) { return false; }

		foreach($tlist as $tname) {
			$inDB->query("OPTIMIZE TABLE {$tname['table_name']}", true);
			$inDB->query("ANALYZE TABLE {$tname['table_name']}", true);
		}

    }

    if ($inDB->errno()){ return false; }

    return true;
    
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function delete($table, $where='', $limit=0) {

    $sql = "DELETE FROM {$table} WHERE {$where}";

    if ($limit) { $sql .= " LIMIT {$limit}"; }

    $result = $this->query($sql, true);

    if ($this->errno()){ return false; }

    return true;

}

public function deleteNS($table, $id) {

    $inCore = cmsCore::getInstance();

    $ns = $inCore->nestedSetsInit($table);

    $ns->DeleteNode($id);

    return true;

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

?>