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
$departemen=$_REQUEST['departemen'];
$tingkat=$_REQUEST['tingkat'];
$tahun=$_REQUEST['tahun'];
$semester=$_REQUEST['semester'];
$kelas=$_REQUEST['kelas'];
$nip=$_REQUEST['nip'];
?>
<frameset cols="15%,*" border="1" frameborder="0" framespacing="0">
    <frame name="penentuan_menu" src="penentuan_menu.php?departemen=<?=$departemen?>&tingkat=<?=$tingkat?>&tahun=<?=$tahun?>&semester=<?=$semester?>&kelas=<?=$kelas?>&nip=<?=$nip?>"
           target="penentuan_menu" style="border:1px; border-bottom-color:#000000; border-bottom-style:solid">
    <frame name="penentuan_content" src="blank_penentuan_content.php" style="border:1px; border-left-color:#000000; border-left-style:solid">
</frameset><noframes></noframes>