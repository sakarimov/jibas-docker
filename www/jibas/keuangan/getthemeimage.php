<?
/**[N]**
 * JIBAS Education Community
 * Jaringan Informasi Bersama Antar Sekolah
 * 
 * @version: 30.0 (Jan 24, 2024)
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
require_once('include/common.php');
require_once('include/sessioninfo.php');
require_once('include/config.php');
require_once('include/db_functions.php');
	$id=$_REQUEST['id'];
	$dir=$_REQUEST['dir'];
	OpenDb();
	$res=QueryDb("SELECT replid FROM jbsuser.hakakses WHERE modul='INFOGURU' AND login='". getIdUser()."'");
	$row=@mysql_fetch_array($res);
	$replid=$row[replid];
	CloseDb();
	OpenDb();
		$sql="UPDATE jbsuser.hakakses SET theme='$id' WHERE replid='$replid'";
		//echo  $sql;
		//exit;
		$res=QueryDb($sql);
	if ($res){
		unset($_SESSION['theme']);
		$_SESSION['theme']=$id;
	}	
	CloseDb();

?>
<img src="<?=$dir?>" width="320" height="240" align="left"/>