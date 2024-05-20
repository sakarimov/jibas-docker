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
require_once('../inc/sessioninfo.php');
require_once('../inc/common.php');
require_once('../inc/config.php');
require_once('../inc/db_functions.php');
require_once('../lib/GetHeaderCetak.php');
OpenDb();
$departemen='yayasan';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../sty/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIBAS SimTaka [Cetak Penerbit]</title>
</head>

<body>
<table border="0" cellpadding="10" cellpadding="5" width="780" align="left">
<tr><td align="left" valign="top">

<?=GetHeader('alls')?>

<center><font size="4"><strong>DATA PENERBIT</strong></font><br /> </center><br /><br />
 
<br />
	<?
	$sql = "SELECT * FROM penerbit ORDER BY kode";
	$result = QueryDb($sql);
	$num = @mysql_num_rows($result);
	?>
	<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tab" id="table">
	  <tr>
		<td height="30" align="center" class="header">Kode</td>
		<td height="30" align="center" class="header">Nama</td>
		<td height="30" align="center" class="header">Jumlah Judul</td>
		<td height="30" align="center" class="header">Jumlah Pustaka</td>
		<td height="30" align="center" class="header">Alamat</td>
		<td height="30" align="center" class="header">Telepon</td>
		<td height="30" align="center" class="header">Keterangan</td>
	  </tr>
	  <?
	  if ($num>0){
		  while ($row=@mysql_fetch_array($result)){
				$num_judul = @mysql_num_rows(QueryDb("SELECT * FROM pustaka p, penerbit pb WHERE pb.replid='$row[replid]' AND pb.replid=p.penerbit"));
				$num_pustaka = @mysql_fetch_row(QueryDb("SELECT COUNT(d.replid) FROM pustaka p, daftarpustaka d, penerbit pb WHERE d.pustaka=p.replid AND pb.replid='$row[replid]' AND p.penerbit=pb.replid"));			  
		  ?>
		  <tr>
			<td height="25" align="center"><?=$row[kode]?></td>
			<td height="25"><div class="tab_content"><?=$row[nama]?></div></td>
			<td height="25" align="center"><?=$num_judul?></td>
			<td height="25" align="center"><?=(int)$num_pustaka[0]?></td>
			<td height="25"><div class="tab_content"><?=$row[alamat]?></div></td>
			<td height="25"><div class="tab_content"><?=$row[telpon]?></div></td>
			<td height="25"><div class="tab_content"><?=$row[keterangan]?></div></td>
		  </tr>
		  <?
		  }
	  } else {
	  ?>
	  <tr>
		<td height="25" colspan="7" align="center" class="nodata">Tidak ada data</td>
	  </tr>
	  <?
	  }
	  ?>	
	</table>
</td></tr></table>
</body>
<script language="javascript">
window.print();
</script>
</html>