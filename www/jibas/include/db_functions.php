<?
/**[N]**
 * JIBAS Education Community
 * Jaringan Informasi Bersama Antar Sekolah
 * 
 * @version: 23.0 (November 12, 2020)
 * @notes: 
 * 
 * Copyright (C) 2024 JIBAS (http://www.jibas.net)
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 **[N]**/ ?>
<?
$mysqlconnection = NULL;

//Buka koneksi ke Database
function OpenDb() 
{
	global $db_host, $db_user, $db_pass, $db_name, $mysqlconnection;

	$mysqlconnection = @mysql_connect($db_host, $db_user, $db_pass) or trigger_error("Can not connect to database server", E_USER_ERROR);
	$select = @mysql_select_db($db_name, $mysqlconnection) or trigger_error("Can not open the database", E_USER_ERROR);
	
	return $mysqlconnection;
}	

function OpenDbi() 
{
	global $db_host, $db_user, $db_pass, $db_name, $conni;

	$conni = @mysqli_connect($db_host, $db_user, $db_pass) or trigger_error("Can not connect to database server", E_USER_ERROR);
	$select = @mysqli_select_db($conni, $db_name) or trigger_error("Can not open the database", E_USER_ERROR);
	
	return $conni;
}

 //Buat query
function QueryDbi($sql) 
{
	$result = mysqli_query($sql) or trigger_error("Failed to execute sql query: $sql", E_USER_ERROR);
	
	return $result;
}

//Tutup koneksi
function CloseDb() 
{
	global $mysqlconnection;
	
	@mysql_close($mysqlconnection);
}

//Buat query
function QueryDb($sql) 
{
	global $mysqlconnection;
	
	$result = mysql_query($sql, $mysqlconnection) or trigger_error("<br>&nbsp;&nbsp;Failed to execute sql query: <br>&nbsp;&nbsp;$sql", E_USER_ERROR);
	
	return $result;
}

function QueryDbTrans($sql, &$success) 
{
	global $mysqlconnection;
	
	$result = @mysql_query($sql, $mysqlconnection);
	$success = ($result && 1); //&& (mysql_affected_rows($mysqlconnection) > 0));
	
	return $result;
}

function OpenDbEx()
{
    global $db_host, $db_user, $db_pass, $db_name, $mysqlconnection;

    $mysqlconnection = @mysql_connect($db_host, $db_user, $db_pass);
    if (mysql_errno() > 0)
        throw new Exception(mysql_error(), mysql_errno());

    $select = @mysql_select_db($db_name, $mysqlconnection);
    if (mysql_errno() > 0)
        throw new Exception(mysql_error(), mysql_errno());

    return $mysqlconnection;
}

function QueryDbEx($sql)
{
    global $mysqlconnection;

    $result = @mysql_query($sql, $mysqlconnection);
    if (mysql_errno() > 0)
         throw new Exception(mysql_error(), mysql_errno());

    return $result;
}

function BeginTrans() 
{
	global $mysqlconnection;
	
	@mysql_query("SET AUTOCOMMIT=0", $mysqlconnection);
	@mysql_query("BEGIN", $mysqlconnection);
}

function CommitTrans() 
{
	global $mysqlconnection;
	
	@mysql_query("COMMIT", $mysqlconnection);
	@mysql_query("SET AUTOCOMMIT=1", $mysqlconnection);
}

function RollbackTrans() 
{
	global $mysqlconnection;
	
	@mysql_query("ROLLBACK", $mysqlconnection);
	@mysql_query("SET AUTOCOMMIT=1", $mysqlconnection);
}

function GetValue($tablename, $column, $where) 
{
	$sql = "SELECT $column FROM $tablename WHERE $where";
	$result_get_value = QueryDb($sql);
	$row_get_value = mysql_fetch_row($result_get_value);
	
	return $row_get_value[0];
}
?>