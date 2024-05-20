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
session_name("jbsperpus");
session_start();

function SI_USER_NAME()
{
	return $_SESSION['nama'];
}

function SI_USER_ID()
{
	return $_SESSION['login'];
}

function SI_USER_LEVEL()
{
	return ($_SESSION['tingkat']);
}

function SI_USER_DEPT()
{
	if ($_SESSION['tingkat'] == 2)
		return ($_SESSION['perpustakaan']);	
	else
		return ('ALL');
}

function SI_USER_IDPERPUS()
{
	if ($_SESSION['tingkat'] == 2)
		return ($_SESSION['idperpustakaan']);	
	else
		return ('ALL');
}

function IsAdmin()
{
	if ($_SESSION['tingkat'] == 0 || $_SESSION['tingkat'] == 1) 
		return true;
	else 
		return false;
}
?>