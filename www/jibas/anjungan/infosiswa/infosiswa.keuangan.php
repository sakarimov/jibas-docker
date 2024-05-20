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
require_once('../include/common.php');
require_once('../include/config.php');
require_once('../include/db_functions.php');
require_once('../include/rupiah.php');
require_once('infosiswa.session.php');
require_once('infosiswa.security.php');
require_once('infosiswa.keuangan.class.php');

OpenDb();

$K = new CK();
?>
<form name="panelkeu">
<input type="hidden" name="nis_awal" id="nis_awal" value="<?= $_SESSION['infosiswa.nis'] ?> " />
<table border="0" cellpadding="2" width='700'>
<tr>
    <td align='left'>
<?  $K->ShowDepartemenComboBox(); ?>
    &nbsp;&nbsp;
<?  $K->ShowTahunBukuComboBox(); ?>
    </td>
    <td align='left'></td>
</tr>
<tr>
    <td align='left' valign='top'>
<?  $K->ShowFinanceReport(); ?>        
    </td>
</tr>
</table>
</form>
<?
CloseDb();
?>