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
require_once("infosiswa.session.php");
require_once("infosiswa.security.php");

$allow = (int)$_REQUEST['allow'] == 1 ? "true" : "false";

$content  = "<?\r\n";
$content .= '$IsAllowStudentEdit = ' . $allow . ';';
$content .= "\r\n";
$content .= "?>\r\n";
file_put_contents('infosiswa.config.php', $content);

require_once("infosiswa.login.php");
?>