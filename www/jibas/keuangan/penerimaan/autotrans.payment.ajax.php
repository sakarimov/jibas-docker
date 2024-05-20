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
require_once('../include/sessionchecker.php');
require_once('../include/common.php');
require_once('../include/compatibility.php');
require_once('../include/rupiah.php');
require_once('../include/config.php');
require_once('../include/db_functions.php');
require_once('autotrans.payment.func.php');

$op = $_REQUEST["op"];
if ($op == "getselect")
{
    $departemen = $_REQUEST["departemen"];
    $kelompok = $_REQUEST["kelompok"];

    OpenDb();
    GetSelectPayment($departemen, $kelompok);
    CloseDb();
}
else if ($op == "getlist")
{
    $idTahunBuku = $_REQUEST["idtahunbuku"];
    $idAutoTrans = $_REQUEST["idautotrans"];
    $kelompok = $_REQUEST["kelompok"];
    $noid = $_REQUEST["noid"];

    OpenDb();
    GetPaymentList($idAutoTrans, $kelompok, $noid, $idTahunBuku);
    CloseDb();
}
?>