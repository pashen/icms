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

	function runQuery($sql){
		if ($sql){
			mysql_query(trim($sql)) or die(mysql_error().'<pre>'.$sql.'</pre>');
		}
	}

	function dbRunSQL($sql_file, $db_pref){
		if (file_exists($sql_file)){
				mysql_query("SET NAMES cp1251");
				$sqlfile = fopen($sql_file, 'r');				
				$sql = '';				
				while(!feof($sqlfile)){
					$str = fgets($sqlfile);
					$str = str_replace("#_", $db_pref, $str);
					if(!preg_match('/^\-\-(.*)$/i', $str)) {
						if (   strstr($str, 'SET ') ||
                                strstr($str, 'CREATE TABLE') ||
                                strstr($str, 'INSERT INTO') ||
                                strstr($str, 'DROP') ||
                                strstr($str, 'UPDATE') ||
                                strstr($str, 'ALTER TABLE')){

                            if ($sql){
                                $sql = str_replace("DEFAULT 'CURRENT_TIMESTAMP'", "DEFAULT CURRENT_TIMESTAMP", $sql);
                                mysql_query($sql) or die(mysql_error().'<pre>'.$sql.'</pre>');
                            }

                            $sql = $str;
                            
						} else {
							$sql .= $str;
						}
					}
				}
				if ($sql!=''){
					mysql_query($sql) or die(mysql_error().'<pre>'.$sql.'</pre>');
				}
				if(!mysql_error()){
					return true;
				} else { return false; }
		}		
	}
	
?>

