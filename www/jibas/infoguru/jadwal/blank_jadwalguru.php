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
require_once('../include/sessioninfo.php');
require_once('../include/common.php');
require_once('../include/config.php');
require_once('../include/db_functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css"  href="../style/style.css">
</head>

<body>
<table border="0" width="100%"  height="100%"align="center">
<!-- TABLE CENTER -->
<tr height="250">
	<td align="left" valign="middle" >

   <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
   <br /><br /><tr><td> </td></tr>
  <tr>
  		<td align="center" valign="middle" height="100%" width="100%">
    <? 	OpenDb();		
		$sql = "SELECT * FROM departemen";    
		$result = QueryDb($sql);
		if (@mysql_num_rows($result) > 0){
	?>
    <font size="2" color="#757575"><b>Klik pada icon <img src="../images/ico/view_x.png" border="0"> di atas untuk melihat jadwal sesuai dengan Guru dan Info Jadwal yang terpilih
    </font> 
     <? } else { ?>
      	<font size = "2" color ="red"><b>Belum ada data Departemen.
        <br />Silahkan isi terlebih dahulu di menu Departemen pada bagian Referensi.
        </b></font> 
   	<? } ?>      
    	</td>
  </tr>
</table>
</td></tr></table>

</body>
</html>