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
require_once ("banksoal.func.php");

$op = $_REQUEST["op"];
if ($op == "getdepartemen")
{
    echo getDepartemen();
}
else if ($op == "getpelajaran")
{
    $dept = $_REQUEST["dept"];

    echo getPelajaran($dept);
}
else if ($op == "gettingkat")
{
    $dept = $_REQUEST["dept"];
    $idPelajaran = $_REQUEST["idpelajaran"];

    echo getTingkat($dept, $idPelajaran);
}
else if ($op == "getsemester")
{
    $dept = $_REQUEST["dept"];
    $idPelajaran = $_REQUEST["idpelajaran"];

    echo getSemester($dept, $idPelajaran);
}
else if ($op == "getbanksoal")
{
    $dept = $_REQUEST["dept"];
    $idPelajaran = $_REQUEST["idpelajaran"];
    $idTingkat = $_REQUEST["idtingkat"];
    $idSemester = $_REQUEST["idsemester"];

    showBankSoal($dept, $idPelajaran, $idTingkat, $idSemester);
}
else if ($op == "getsoalpenjelasan")
{
    $idSoal = $_REQUEST["idsoal"];
    $idUjianSerta = $_REQUEST["idujianserta"];
    $viewExp = $_REQUEST["viewexp"];

    echo getSoalPenjelasan($idSoal, $idUjianSerta, $viewExp);
}
?>