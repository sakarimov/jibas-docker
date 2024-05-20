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
require_once ("include/session.php");
require_once ("include/config.php");
require_once ("include/db_functions.php");
require_once ("search.video.func.php");
require_once ("common.func.php");

$op = $_REQUEST["op"];
if ($op == "search")
{
    $searchKey = $_REQUEST["searchKey"];
    $searchDept = $_REQUEST["searchDept"];
    $page = $_REQUEST["page"];

    OpenDb();
    require_once("search.video.php");
    CloseDb();
}
else if ($op == "nextSearch")
{
    $idMediaList = $_REQUEST["idMediaList"];
    $page = $_REQUEST["page"];

    OpenDb();
    DisplayVideoSearchList($idMediaList, $page);
    CloseDb();
}
?>