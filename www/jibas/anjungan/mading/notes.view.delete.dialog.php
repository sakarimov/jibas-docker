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
$notesid = $_REQUEST['notesid'];
?>
<input type='hidden' id='not_DelNotes_Notesid' value='<?=$notesid?>'>
Silahkan login terlebih dahulu untuk menghapus notes ini.<br>
Notes ini hanya dapat diubah oleh pemilik pesan atau Administrator JIBAS.<br>
<table>
<tr>
    <td width='100' align='right'>Login</td>
    <td align='left'><input type='text' id='not_DelNotes_Login' class='inputbox' size='12' maxlength='25'></td>
</tr>
<tr>
    <td align='right'>Password</td>
    <td align='left'><input type='password' id='not_DelNotes_Password' class='inputbox' size='12' maxlength='25'></td>
</tr>    
</table>