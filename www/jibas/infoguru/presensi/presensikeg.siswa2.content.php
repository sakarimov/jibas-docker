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
$idkegiatan = $_REQUEST['idkegiatan'];
$bulan = $_REQUEST['bulan'];
$tahun = $_REQUEST['tahun'];
?>
<frameset cols="360,*" border="1" frameborder="yes" framespacing="yes">
<frame src="presensikeg.siswa2.siswa.php?idkegiatan=<?=$idkegiatan?>&bulan=<?=$bulan?>&tahun=<?=$tahun?>"
       name="siswa"
       style="border-width: 1px; border-bottom-color:#000000; border-bottom-style:solid" />
<frame src="presensikeg.blank.php" name="report" />
</frameset>
<noframes></noframes>