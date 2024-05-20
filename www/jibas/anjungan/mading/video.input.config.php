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
$allowedVideoType = array('.mp4', '.m4v', '.flv', '.f4v');
$maxCoverWidth = 220;
$maxCoverHeight = 180;
$maxNotesLength = 2000;
$maxCommentLength = 1000;
$previewTextLength = 480;
$employeeMaxFileSize = 25; // MB
$studentMaxFileSize = 10; // MB

function CreateVideoInputConfigJavaScript()
{
    global $allowedVideoType, $maxNotesLength, $maxCommentLength;

	$content = "";    
   
    $item = "";
    for($i = 0; $i < count($allowedVideoType); $i++)
    {
        if ($item != "")
            $item .= ", ";
        $item .= "'" . $allowedVideoType[$i] . "'";    
    }
    $content .= "var vidinp_AllowedVideoType = [$item];\r\n";
    $content .= "var vidinp_MaxNotesLength = $maxNotesLength;\r\n";
	$content .= "var vidinp_MaxCommentLength = $maxCommentLength;\r\n";
	
	file_put_contents('video.input.config.js', $content);
}

function GetAllowedVideoType()
{
    global $allowedVideoType;
    
    $item = "";
    for($i = 0; $i < count($allowedVideoType); $i++)
    {
        if ($item != "")
            $item .= ", ";
        $item .= $allowedVideoType[$i];    
    }
    
    return $item;
}

?>