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
require_once ("include/config.php");
require_once ("include/db_functions.php");
require_once ("include/session.php");
require_once ("show.media.func.php");
require_once ("common.func.php");

if (!isset($_SESSION["IsLogin"]))
    exit();

$op = $_REQUEST["op"];
if ($op == "setLike")
{
    $like = $_REQUEST["like"];
    $idMedia = $_REQUEST["idMedia"];

    OpenDb();
    echo SetMediaLike($like, $idMedia);
    CloseDb();
}
else if ($op == "saveNotes")
{
    $idMedia = $_REQUEST["idMedia"];
    $notes = $_REQUEST["notes"];

    OpenDb();
    SaveNotes($idMedia, $notes);
    CloseDb();
}
else if ($op == "reloadNotes")
{
    $idMedia = $_REQUEST["idMedia"];

    OpenDb();
    ShowMediaNotesList($idMedia);
    CloseDb();
}
else if ($op == "removeNotes")
{
    $idNotes = $_REQUEST["idNotes"];

    OpenDb();
    RemoveNotes($idNotes);
    CloseDb();
}
?>