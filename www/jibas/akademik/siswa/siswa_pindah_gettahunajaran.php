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
$departemen=$_POST['departemen'];

  OpenDb();
	$sql_tahunajaran = "SELECT replid,tahunajaran FROM tahunajaran where departemen='$departemen' AND aktif = 1 ";
	$result_tahunajaran = QueryDb($sql_tahunajaran);
	if($row_tahunajaran = mysql_fetch_array($result_tahunajaran)) {
?>
  <input type="text" name="tahunajaran" id="tahunajaran" size="21" class="disabled" readonly="readonly" value="<?=$row_tahunajaran['tahunajaran']?>">
  <input type="hidden" name="idtahunajaran" id="idtahunajaran" value="<?=$row_tahunajaran[replid]?>">
  
  <?
  } //while
CloseDb();
?>