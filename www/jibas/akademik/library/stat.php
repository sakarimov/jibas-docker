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
/*
Kalo dari kesiswaan, kode=0
Kalo dari calonsiswa, kode=1

*/
$kode="";
if (isset($_REQUEST[kode])){
	$kode=$_REQUEST[kode];
	}
?>
<frameset rows="65,*" border="1">
	<frame name="statheader" src="statheader.php?kode=<?=$kode?>" scrolling="no" />
    <frame name="statcontent" src="blank.php" />
</frameset><noframes></noframes>