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

$ERRMSG = "";

$nis = trim($_REQUEST['nis']);
$pin = trim($_REQUEST['pin']);

if (strlen($nis) == 0 || strlen($pin) == 0)
{
    include("infosiswa.login.php");
    exit();
}

OpenDb();
$sql = "SELECT COUNT(replid)
          FROM jbsakad.siswa
         WHERE nis = '$nis' AND pinsiswa = '$pin'";
$ndata = (int)FetchSingle($sql);

if ($ndata == 0)
{
    CloseDb();
    $ERRMSG = "NIS atau PIN salah!";
    include("infosiswa.login.php");
    exit();
}

require_once("infosiswa.session.php");

$_SESSION['islogin'] = true;
?>
<script>
    $.ajax({
        url : 'infosiswa/infosiswa.content.php?nis=<?=$nis?>&reporttype=PROFIL',
        type: 'get',
        success : function(html) {
            $('#is_main').html(html);
        }
    })    
</script>
