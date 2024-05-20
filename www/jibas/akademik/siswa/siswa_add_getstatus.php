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
require_once('../include/errorhandler.php');
require_once('../include/sessioninfo.php');
require_once('../include/common.php');
require_once('../include/config.php');
require_once('../include/db_functions.php');
require_once('../include/theme.php'); 

$status_kiriman=$_REQUEST['status'];

?>


<select name="status" id="status" class="ukuran" onKeyPress="return focusNext('kondisi', event)">
	<option value="">[Pilih Status]</option>
    <? // Olah untuk combo status
	OpenDb();
	$sql_status="SELECT replid,status,urutan FROM jbsakad.statussiswa ORDER BY urutan";
	$result_status=QueryDB($sql_status);
	while ($row_status = mysql_fetch_array($result_status)) {
	//tambahan
	//if($status_kiriman=="")
	//$status_kiriman=$row_status['status'];
	// end of tambahan
	?>
    <option value="<?=$row_status['status']?>"<?=StringIsSelected($row_status['status'],$status_kiriman)?> ><?=$row_status['status']?></option>
	<?
    } 
	CloseDb();
	// Akhir Olah Data status
	?>
    </select>&nbsp;<img src="../images/ico/tambah.png" onclick="tambah_status();" />