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
$tingkat=$_REQUEST['tingkat'];
$semester=$_REQUEST['semester'];
$pelajaran=$_REQUEST['pelajaran'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> Content Penentuan Nilai Rapor </TITLE>
</HEAD>
<frameset cols="18%,*" border="1" frameborder="0" framespacing = "0">
    <frame name="menu" src="ujian_rpp_kelas_menu.php?tingkat=<?=$tingkat?>&semester=<?=$semester?>&pelajaran=<?=$pelajaran?>" >
    <frame name="content" src="../blank.php" style="border:1px; border-left-color:#000000; border-left-style:solid">
</frameset><noframes></noframes>
</HTML>