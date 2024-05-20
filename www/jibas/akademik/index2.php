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
require_once("cek.php");

if (isset($_REQUEST['theme']))
	$theme=$_REQUEST['theme'];
?>
<title>JIBAS - AKADEMIK</title>
<link href="images/jibas2015.ico" rel="shortcut icon" />
<frameset border="0" frameborder="0" framespacing="0" rows="87,*,41">
	<frame name="frametop" src="frametop.php" scrolling="no" noresize="noresize" />
    <frameset border="0" frameborder="0" framespacing="0" cols="20,*,27">
    	<frame name="frameleft" src="frameleft.php" scrolling="no" noresize="noresize" />
        <frame name="content" src="referensi.php"/>
        <frame name="frameright" src="frameright.php" scrolling="no" noresize="noresize" />
    </frameset>
    <frame name="framebottom" src="framebottom.php" scrolling="no" noresize="noresize" />
</frameset><noframes></noframes>