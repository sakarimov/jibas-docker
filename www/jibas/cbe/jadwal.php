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
<?php
require_once("jadwal.func.php");
?>
<font class="mainPageTitle">Jadwal Ujian</font><br><br>

<table border="0" cellpadding="2" cellspacing="0">
<tr>
    <td align="left" width="70">Ruangan: </td>
    <td align="left" width="250">
        <span id="jadwal_spCbRuangan">
            memuat ..
        </span>
    </td>
    <td align="left" rowspan="2">
        <img src="images/view.png" onclick="jadwal_showJadwalUjian()">
    </td>
</tr>
<tr>
    <td align="left">Bulan: </td>
    <td align="left">
        <?= showSelectBulan() ?>
        <?= showSelectTahun() ?>
    </td>
</tr>
</table>
<br>
<div id="jadwal_divJadwalUjian" style="width: 100%">
</div>