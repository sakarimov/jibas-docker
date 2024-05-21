<?php
/**[N]**
 * JIBAS Education Community
 * Jaringan Informasi Bersama Antar Sekolah
 * 
 * @version: 29.0 (Sept 20, 2023)
 * @notes: JIBAS Education Community will be managed by Yayasan Indonesia Membaca (http://www.indonesiamembaca.net)
 * 
 * Copyright (C) 2009 Yayasan Indonesia Membaca (http://www.indonesiamembaca.net)
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
<?php
require_once('../include/common.php');
require_once('../include/sessioninfo.php');
require_once('../include/config.php');
require_once('../include/db_functions.php');
require_once("../include/sessionchecker.php");

	$id=$_REQUEST['id'];
	$dir=$_REQUEST['dir'];
	OpenDb();
	$res=QueryDb("SELECT replid FROM jbsuser.hakakses WHERE modul='INFOGURU' AND login='".SI_USER_ID()."'");
	$row=@mysqli_fetch_array($res);
	$replid=$row['replid'];
	CloseDb();
	OpenDb();
		$sql="UPDATE jbsuser.hakakses SET theme=$id WHERE replid=$replid";
		//echo $sql;
		//exit;
		$res=QueryDb($sql);
	if ($res){
		unset($_SESSION['theme']);
		$_SESSION['theme']=$id;
	}	
	CloseDb();

?>
<img src="<?=$dir?>" width="320" height="240" align="left"/>