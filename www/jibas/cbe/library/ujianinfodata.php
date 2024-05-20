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
class UjianInfoData
{
    public $UserId;
    public $UserType; // 1 Pegawai 2 Siswa 3 Calon Siswa
    public $UserName;
    public $IdUjian;
    public $IdUjianRemed;
    public $IdRemedUjian;
    public $IdUjianSerta;
    public $IdJadwalUjian;
    public $Judul;
    public $Keterangan;
    public $IdPengujian;
    public $Pengujian;
    public $StatusPengujian; // 0 Umum 1 Tertutup
    public $IdPelajaran;
    public $Pelajaran;
    public $RandomSoal;
    public $RandomJwb;
    public $NSoal;
    public $NFollow;
    public $Durasi;
    public $Elapsed;
    public $JadwalStatus;
    public $DtStartTime;
    public $DtEndTime;
    public $StartTime;
    public $EndTime;
    public $ViewKey;
    public $ViewExp;
    public $ViewResult;
    public $ViewSoal;
    public $ViewAfter;
    public $AllowPrint;
    public $SkalaNilai;
    public $NilaiKkm;
    public $JBenar;
    public $JSalah;
    public $JEssay;
    public $TotalBobot;
    public $TotalNilai;
    public $StatusUjian;
    public $Nilai;
    public $ServerTime;

    public $UjianMode;
    public $UjianToken;
    public $SubmitDate;
    public $NoSubmitDate;
    public $AllowOffline;
    public $IdPemilik;
    public $Pemilik;
}
?>