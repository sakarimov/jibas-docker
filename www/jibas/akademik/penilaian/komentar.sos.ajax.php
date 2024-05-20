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
require_once('../include/errorhandler.php');
require_once('../include/sessioninfo.php');
require_once('../include/common.php');
require_once('../include/config.php');
require_once('../include/db_functions.php');
require_once('../include/compatibility.php');
require_once('komentar.sos.func.php');

$op = $_REQUEST['op'];

if ($op == "getlistkomentar")
{
    $idpelajaran = $_REQUEST['idpelajaran'];
    $idtingkat = $_REQUEST['idtingkat'];
    $jenis = $_REQUEST['jenis'];

    OpenDb();
    echo GetListKomentar($idpelajaran, $idtingkat, $jenis);
    CloseDb();

    http_response_code(200);
}
else if ($op == "getkomentar")
{
    $replid = $_REQUEST['replid'];

    OpenDb();
    echo GetKomentar($replid);
    CloseDb();

    http_response_code(200);
}
else if ($op == "delkomentar")
{
    $replid = $_REQUEST['replid'];

    $idpelajaran = $_REQUEST['idpelajaran'];
    $idtingkat = $_REQUEST['idtingkat'];
    $jenis = $_REQUEST['jenis'];

    OpenDb();
    $sql = "DELETE FROM jbsakad.pilihkomensos WHERE replid = '$replid'";
    QueryDb($sql);

    echo GetListKomentar($idpelajaran, $idtingkat, $jenis);
    CloseDb();

    http_response_code(200);
}
?>