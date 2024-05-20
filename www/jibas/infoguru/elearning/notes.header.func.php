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
function ShowCbTanggal()
{
    $sql = "SELECT DAY(NOW()), MONTH(NOW()), YEAR(NOW())";
    $res = QueryDb($sql);
    $row = mysql_fetch_row($res);

    $day = $row[0];
    $month = $row[1];
    $year = $row[2];

    ShowCbDay("tanggal1", $day);
    ShowCbMonth("bulan1", $month);
    ShowCbYear("tahun1", $year);
    echo "&nbsp;&nbsp;s/d&nbsp;&nbsp;";
    ShowCbDay("tanggal2", $day);
    ShowCbMonth("bulan2", $month);
    ShowCbYear("tahun2", $year);
}

function ShowCbDay($name, $day)
{
    echo "<select id='$name' onchange='changeDate()'>";
    for($i = 1; $i <= 31; $i++)
    {
        $selected = $i == $day ? "selected" : "";
        echo "<option value='$i' $selected>$i</option>";
    }
    echo "</select>";
}

function ShowCbMonth($name, $month)
{
    echo "<select id='$name' onchange='changeDate()'>";
    for($i = 1; $i <= 12; $i++)
    {
        $selected = $i == $month ? "selected" : "";
        echo "<option value='$i' $selected>$i</option>";
    }
    echo "</select>";
}

function ShowCbYear($name, $year)
{
    echo "<select id='$name' onchange='changeDate()'>";
    for($i = 2019; $i <= $year + 1; $i++)
    {
        $selected = $i == $year ? "selected" : "";
        echo "<option value='$i' $selected>$i</option>";
    }
    echo "</select>";
}

?>
