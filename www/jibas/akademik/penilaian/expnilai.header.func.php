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
function ReadParams()
{
    global $departemen, $tingkat, $kelas, $tahunajaran, $semester;

    $departemen="";
    if (isset($_REQUEST['departemen']))
        $departemen=$_REQUEST['departemen'];

    $tingkat = "";
    if (isset($_REQUEST['tingkat']))
        $tingkat=$_REQUEST['tingkat'];

    $kelas = "";
    if (isset($_REQUEST['kelas']))
        $kelas=$_REQUEST['kelas'];

    $tahunajaran = "";
    if (isset($_REQUEST['tahunajaran']))
        $tahunajaran=$_REQUEST['tahunajaran'];

    $semester = "";
    if (isset($_REQUEST['semester']))
        $semester=$_REQUEST['semester'];
}
?>
