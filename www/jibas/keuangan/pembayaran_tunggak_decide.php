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
$idkategori = $_REQUEST['idkategori'];
$idpenerimaan = (int)$_REQUEST['idpenerimaan'];
$idtahunbuku = (int)$_REQUEST['idtahunbuku'];
$status = $_REQUEST['status'];
$departemen = $_REQUEST['departemen'];

switch ($idkategori) 
{
	case 'JTT': 
		$nis = (string)$_REQUEST['id'];
		header("Location: pembayaran_tunggak_jtt.php?idkategori=$idkategori&idpenerimaan=$idpenerimaan&nis=$nis&idtahunbuku=$idtahunbuku&departemen=$departemen");	
		break;
	case 'CSWJB':
		$id = (string)$_REQUEST['id'];
		header("Location: pembayaran_tunggak_jttcalon.php?idkategori=$idkategori&idpenerimaan=$idpenerimaan&nopendaftaran=$id&idtahunbuku=$idtahunbuku&departemen=$departemen");
		break;			
}
?>