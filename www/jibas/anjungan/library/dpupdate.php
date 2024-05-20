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
require_once('../include/common.php');
require_once('../include/config.php');
require_once('../include/db_functions.php');

OpenDb();
$sql = "SELECT * FROM jbsakad.dasarpenilaian WHERE keterangan IS NULL";
$res = QueryDb($sql);
if (mysql_num_rows($res) > 0)
{
	while($row = mysql_fetch_array($res))
	{
		$replid = $row['replid'];
		$dp = $row['dasarpenilaian'];
		
		if ($dp == "Pemahaman Konsep")
			$sql = "UPDATE jbsakad.dasarpenilaian SET dasarpenilaian = 'PKON', keterangan = 'Pemahaman Konsep', issync = 0 WHERE replid = '$replid'";
		else if ($dp == "Praktik")
			$sql = "UPDATE jbsakad.dasarpenilaian SET dasarpenilaian = 'PRAK', keterangan = 'Praktik', issync = 0 WHERE replid = '$replid'";
		QueryDb($sql);
	}
}
CloseDb();
?>
