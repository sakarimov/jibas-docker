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
require_once('../include/config.php');
require_once('../include/db_functions.php');

if (isset($_REQUEST['nis']))
	$nis=$_REQUEST['nis'];
else 
	$nip=$_REQUEST['nip'];
	
OpenDb();
header("Content-type: image/jpeg");
if (isset($_REQUEST[nis]))
	$query = "SELECT foto FROM jbsakad.siswa WHERE nis = '$nis'";
else 
	$query = "SELECT foto FROM jbssdm.pegawai WHERE nip = '$nip'";
$result = QueryDb($query);
if ($row = mysql_fetch_array($result))
{
    if($row[foto])
	{
        echo $row[foto];
    }
	else
	{
    	$filename = "../img/no_image.png";
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));

        echo $contents;
    }
}
CloseDb();
?>