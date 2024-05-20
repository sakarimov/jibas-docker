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
/* Awal tahun pendataan menggunakan SISFO JIBAS */
$G_START_YEAR=getenv("G_START_YEAR");

/* Alamat Server aplikasi SISFO JIBAS 
     Alamat ini digunakan untuk menampilkan header cetak di laporan-laporan yang disediakan SISFO JIBAS 
     PERHATIAN:
       UNTUK PENGGUNAAN MULTIUSER di LOCAL AREA NETWORK
       JANGAN MENGGUNAKAN localhost, TETAPI GUNAKAN IP Address atau Hostname */
$G_SERVER_ADDR='localhost/jibas';

/* Sistem operasi yang digunakan ( win | lin ) */
$G_OS='lin';

/* Lokasi Sekolah */
$G_LOKASI="Bandung";
?>
