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
$key = $_REQUEST["key"];
$keyword = $_REQUEST["keyword"];
$departemen = $_REQUEST["departemen"];
$kode = $_REQUEST["kode"];
?>
<frameset cols="60%,*" border="1" frameborder="1" framespacing="0">
	<frame name="statgrafik" src="statgrafik.php?key=<?=$key?>&keyword=<?=$keyword?>&departemen=<?=$departemen?>&kode=<?=$kode?>">
    <frameset rows="150,*" border="1" frameborder="1" framespacing="0">
	    <frame name="stattabel" src="stattabel.php?key=<?=$key?>&keyword=<?=$keyword?>&departemen=<?=$departemen?>&kode=<?=$kode?>" />
        <frame name="statdetail" src="blank.php" />
    </frameset>
</frameset><noframes></noframes>