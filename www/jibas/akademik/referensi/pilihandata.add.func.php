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
    global $idtambahan, $pilihan, $urutan;

    if (isset($_REQUEST['idtambahan']))
        $idtambahan = $_REQUEST['idtambahan'];

    if (isset($_REQUEST['urutan']))
        $urutan = $_REQUEST['urutan'];

    if (isset($_REQUEST['pilihan']))
        $pilihan = CQ($_REQUEST['pilihan']);
}

function SimpanData()
{
    global $ERROR_MSG;
    global $idtambahan, $pilihan, $urutan;

    $ERROR_MSG = "";
    if (!isset($_REQUEST['Simpan']))
        return;

    OpenDb();

    $sql = "SELECT replid 
              FROM pilihandata 
             WHERE pilihan = '$pilihan'
               AND idtambahan = '$idtambahan'";
    $result = QueryDb($sql);

    if (mysql_num_rows($result) > 0)
    {
        CloseDb();
        $ERROR_MSG = "Pilihan $pilihan sudah digunakan!";
    }
    else
    {
        $sql = "INSERT INTO pilihandata 
                   SET idtambahan = '$idtambahan', pilihan = '$pilihan', urutan = '$urutan'";
        $result = QueryDb($sql);
        if ($result)
        { 	?>
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
