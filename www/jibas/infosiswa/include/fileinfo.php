<?php
/**[N]**
 * JIBAS Education Community
 * Jaringan Informasi Bersama Antar Sekolah
 * 
 * @version: 29.0 (Sept 20, 2023)
 * @notes: JIBAS Education Community will be managed by Yayasan Indonesia Membaca (http://www.indonesiamembaca.net)
 * 
 * Copyright (C) 2009 Yayasan Indonesia Membaca (http://www.indonesiamembaca.net)
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
<?php
function GetFileExt($filename) 
{
	$part = explode(".", (string) $filename);
	return "." . $part[count($part) - 1];
}

function GetFileName($filename)
{
	$part = explode(".", (string) $filename);
	$ndot = count($part);
	
	$name = "";
	for ($i = 0; $i < $ndot - 1; $i++) 
	{
		if (strlen($name) > 0)
			$name = $name . ".";
		$name = $name . $part[$i];
	}
	return $name;
}
?>