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
require_once('../include/config.php');
OpenDb();
$sql_identitas = "SELECT * FROM jbsumum.identitas";
$result_identitas = QueryDb($sql_identitas); 
$row_iden = mysql_fetch_array($result_identitas);
$replid_logo = $row_iden['replid'];

?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="20%" align="center">
    <!--<img src="<?//=cari_gambar()?>?replid=<?//=$replid_logo?>&table=jbsumum.identitas" />-->
	<!--<img src="../images/logokecil.gif" border="0" />-->
	<!--<img src="<?=$full_url?>referensi/finallogo.jpg" border="0" />-->
	<img src="<?//=cari_gambar()?>?replid=<?//=$replid_logo?>&table=jbsumum.identitas" />
	</td>
    <td valign="top">
  
       	<? 
			$result_identitas = QueryDb($sql_identitas); 
			if (mysql_num_rows($result_identitas) >  0) {	
			$row_identitas = mysql_fetch_array($result_identitas);?>
            <font size="5"><strong><?=$row_identitas['nama']?></strong></font><br />
            <strong>
		<? 	if ($row_identitas['alamat2'] <> "" && $row_identitas['alamat1'] <> "")
            	echo "Lokasi 1: ";
		  	if ($row_identitas['alamat1'] != "") 
				echo $row_identitas['alamat1'];
						
			if ($row_identitas['telp1'] != "" || $row_identitas['telp2'] != "") 
				echo "<br>Telp. ";	
			if ($row_identitas['telp1'] != "" ) 
				echo $row_identitas['telp1'];	
			if ($row_identitas['telp1'] != "" && $row_identitas['telp2'] != "") 
					echo ", ";
			if ($row_identitas['telp2'] != "" ) 
				echo $row_identitas['telp2'];			
			if ($row_identitas['fax1'] != "" ) 
				echo "&nbsp;&nbsp;Fax. ".$row_identitas['fax1']."&nbsp;&nbsp;";
			if ($row_identitas['alamat2'] <> "" && $row_identitas['alamat1'] <> "") {
				echo "<br>";
            	echo "Lokasi 2: ";
				echo $row_identitas['alamat2'];
								
				if ($row_identitas['telp3'] != "" || $row_identitas['telp4'] != "") 
					echo "<br>Telp. ";	
				if ($row_identitas['telp3'] != "" ) 					
					echo $row_identitas['telp3'];
				if ($row_identitas['telp3'] != "" && $row_identitas['telp4'] != "") 
					echo ", ";
				if ($row_identitas['telp4'] != "" ) 
					echo $row_identitas['telp4'];				
				if ($row_identitas['fax2'] != "" ) 
					echo "&nbsp;&nbsp;Fax. ".$row_identitas['fax2'];	
			}
			if ($row_identitas['situs'] != "" || $row_identitas['email'] != "")
				echo "<br>";
			if ($row_identitas['situs'] != "" ) 
				echo "Website: ".$row_identitas['situs']."&nbsp;&nbsp;";
			if ($row_identitas['email'] != "" ) 
				echo "Email: ".$row_identitas['email'];
			
		?>
            </strong>
   		<? }  ?>
    </td>
</tr>
<tr>
	<td colspan="2"><hr width="100%" /></td>
</tr>
</table>
<br />