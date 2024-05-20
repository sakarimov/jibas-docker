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
function ReadParams()
{
    global $idtambahan, $idpilihan, $pilihan, $urutan;

    $idtambahan = $_REQUEST['idtambahan'];

    if (isset($_REQUEST['idpilihan']))
        $idpilihan = $_REQUEST['idpilihan'];

    if (isset($_REQUEST['urutan']))
        $urutan = $_REQUEST['urutan'];

    if (isset($_REQUEST['pilihan']))
        $pilihan = CQ($_REQUEST['pilihan']);
}

function ReadData()
{
    global $idpilihan, $pilihan, $urutan;

    OpenDb();

    $sql = "SELECT pilihan, urutan 
              FROM jbssdm.pilihandata 
             WHERE replid = '$idpilihan'";
    $result = QueryDb($sql);
    if (mysql_num_rows($result) > 0)
    {
        $row = mysql_fetch_row($result);
        $pilihan = $row[0];
        $urutan = $row[1];
    }

    CloseDb();
}

function SaveData()
{
    global $idtambahan, $idpilihan, $pilihan, $urutan;

    global $ERROR_MSG;

    $ERROR_MSG = "";
    if (!isset($_REQUEST['Simpan']))
        return;

    OpenDb();

    $sql = "SELECT * 
              FROM jbssdm.pilihandata 
             WHERE pilihan = '$pilihan'
               AND idtambahan = '$idtambahan'
               AND replid <> '$idpilihan'";
    $result = QueryDb($sql);

    if (mysql_num_rows($result) > 0)
    {
        CloseDb();
        $ERROR_MSG = "Pilihan $pilihan sudah digunakan!";
    }
    else
    {
        $sql = "UPDATE jbssdm.pilihandata
                   SET pilihan = '$pilihan', urutan = '$urutan' 
                 WHERE replid = '$idpilihan'";
        $result = QueryDb($sql);
        if ($result)
        { ?>
            <script language="javascript">
                opener.refresh();
                window.close();
            </script>
            <?
        }
        CloseDb();
        exit();
    }
}
?>
