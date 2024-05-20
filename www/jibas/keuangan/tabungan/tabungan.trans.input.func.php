<?
/**[N]**
 * JIBAS Education Community
 * Jaringan Informasi Bersama Antar Sekolah
 * 
 * @version: 23.0 (November 12, 2020)
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
function FetchDataSiswa()
{
    global $nis, $nama, $telpon, $hp, $namatingkat, $namakelas, $alamattinggal, $keterangansiswa, $replid;
        
    $sql = "SELECT s.replid as replid, nama, telponsiswa as telpon, hpsiswa as hp, kelas as namakelas, 
                   alamatsiswa as alamattinggal, tingkat as namatingkat, s.keterangan 
              FROM jbsakad.siswa s, jbsakad.kelas k, jbsakad.tingkat t 
             WHERE s.idkelas = k.replid AND nis = '$nis' AND t.replid = k.idtingkat";
    $result = QueryDb($sql);
    if (mysql_num_rows($result) == 0) 
    {
        // tidak ditemukan data siswa, aplikasi keluar!
        CloseDb();
        exit();
    } 
    else 
    {
        $row = mysql_fetch_array($result);
        $replid = $row['replid'];
        $nama = $row['nama'];
        $telpon = $row['telpon'];
        $hp = $row['hp'];
        $namatingkat = $row['namatingkat'];
        $namakelas = $row['namakelas'];
        $alamattinggal = $row['alamattinggal'];
        $keterangansiswa = $row['keterangan'];
    }    
}

function FetchDataTabungan()
{
    global $idtabungan, $namatabungan, $defrekkas, $smsinfo;
    
    $sql = "SELECT nama, rekkas, info2 FROM datatabungan WHERE replid = '$idtabungan'";
    $result = QueryDb($sql);
    $row = mysql_fetch_row($result);
    $namatabungan = $row[0];
    $defrekkas = $row[1];  // Default Rekening Kas
    $smsinfo = (int)$row[2];
}

function SimpanTransaksi()
{
    $op = $_REQUEST['op'];
    
    if ($op == "348328947234923")
        SimpanSetoran();
        
    if ($op == "348328947234925")
        SimpanTarikan();
}

function SimpanTarikan()
{
    global $smsinfo;
    
    $nis = $_REQUEST['nis'];
    $idtabungan = $_REQUEST['idtabungan'];
    $idtahunbuku = $_REQUEST['idtahunbuku'];
    $jtarik = (int)$_REQUEST['jtarik'];
    $keterangantarik = $_REQUEST['keterangan'];
    
    $sql = "SELECT SUM(kredit - debet)
              FROM tabungan
             WHERE nis = '$nis'
               AND idtabungan = '$idtabungan'";
    $jsaldo = (int)FetchSingle($sql);
    if ($jtarik > $jsaldo)
    {
        $errmsg = "Saldo tabungan tidak mencukupi untuk penarikan";
        
        $r = rand(10000, 99999);		
        header("Location: tabungan.trans.input.php?r=$r&idtabungan=$idtabungan&nis=$nis&idtahunbuku=$idtahunbuku&errmsg=$errmsg&jtarik=$jtarik&keterangantarik=$keterangantarik");
	
        exit();   
    }
    
    // Ambil informasi kode rekening berdasarkan jenis penerimaan
	$sql = "SELECT rekkas, rekutang, nama
              FROM datatabungan
             WHERE replid = '$idtabungan'";
	$row = FetchSingleRow($sql);
	$rekkas = $row[0];
	$rekutang = $row[1];
	$namatabungan = $row[2];
    
    if (isset($_REQUEST['rekkas']))
        $rekkas = $_REQUEST['rekkas'];
    
    // linked variable
	$pengguna = getUserName();
	$errmsg = "";
    
    //Ambil nama siswa
    $sql = "SELECT nama FROM jbsakad.siswa WHERE nis = '$nis'";
    $row = FetchSingleRow($sql);
    $namasiswa = $row[0];
    
    //Ambil awalan dan cacah tahunbuku untuk bikin nokas;
    $sql = "SELECT awalan, cacah FROM tahunbuku WHERE replid = '$idtahunbuku'";
    $row = FetchSingleRow($sql);
    $awalan = $row[0];
    $cacah = $row[1];
    
    $cacah += 1; // Increment cacah
    $nokas = $awalan . rpad($cacah, "0", 6); // Form nomor kas
        
    // tanggal & petugas pendata & keterangan
    $ttarik = date("Y-m-d");
    $idpetugas = getIdUser();
    $petugas = getUserName();
    $keterangan = "Penarikan Tabungan $namatabungan siswa $namasiswa ($nis)";
    $ketsms = "Penarikan Tabungan $namatabungan";
    
    $success = true;
    BeginTrans();
    
    // simpan ke table jurnal
    $idjurnal = 0;
    if ($success)
        $success = SimpanJurnal($idtahunbuku, $ttarik, $keterangan, $nokas, "", $idpetugas, $petugas, "tarikantabungan", $idjurnal);
    
    // simpan ke tabel tabungan
    if ($success) 
    {
        $sql = "INSERT INTO tabungan
                   SET nis='$nis', idtabungan='$idtabungan', debet='$jtarik', kredit='0',
                       keterangan = '" . CQ($keterangantarik) . "', 
                       petugas='$idpetugas', idjurnal='$idjurnal', tanggal=NOW()";		
        QueryDbTrans($sql, $success);
    }
    
    // simpan ke table jurnaldetail
    if ($success) 
        $success = SimpanDetailJurnal($idjurnal, "K", $rekkas, $jtarik);
        
    if ($success) 
        $success = SimpanDetailJurnal($idjurnal, "D", $rekutang, $jtarik);
        
    //increment cacah di tahunbuku
    if ($success) 
    {
        $sql = "UPDATE tahunbuku SET cacah=cacah+1 WHERE replid=$idtahunbuku";
        QueryDbTrans($sql, $success);
    }
    
    // -- Kirim SMS Informasi Pembayaran Siswa
    if ($success && $smsinfo == 1)
    {
        $sql = "SELECT departemen
                  FROM jbsfina.tahunbuku
                 WHERE replid = '$idtahunbuku'";
        $departemen = FetchSingle($sql);

        $jsaldo = $jsaldo - $jtarik;
        
        CreateSMSTabungan('SISTAB',
                             $departemen, $nis, $namasiswa,
                             RegularDateFormat($ttarik),
                             FormatRupiah($jtarik),
                             FormatRupiah($jsaldo),
                             $ketsms,
                             $keterangantarik,
                             $success);
    }
    
    if ($success) 
        CommitTrans();				
    else 
        RollbackTrans();
        
    CloseDb();

    $r = rand(10000, 99999);		
	header("Location: tabungan.trans.input.php?r=$r&idtabungan=$idtabungan&nis=$nis&idtahunbuku=$idtahunbuku&errmsg=$errmsg&jtarik=$jtarik&keterangantarik=$keterangantarik");
	
	exit();   
}

function SimpanSetoran()
{
    global $smsinfo;

    $nis = $_REQUEST['nis'];
    $idtabungan = $_REQUEST['idtabungan'];

    // Ambil informasi kode rekening berdasarkan jenis penerimaan
	$sql = "SELECT rekkas, rekutang, nama
              FROM datatabungan
             WHERE replid = '$idtabungan'";
	$row = FetchSingleRow($sql);
	$rekkas = $row[0];
	$rekutang = $row[1];
	$namatabungan = $row[2];

    $sql = "SELECT SUM(kredit - debet)
              FROM tabungan
             WHERE nis = '$nis'
               AND idtabungan = '$idtabungan'";
    $jsaldo = (int)FetchSingle($sql);
    
    if (isset($_REQUEST['rekkas']))
        $rekkas = $_REQUEST['rekkas'];
    
    // linked variable
	$pengguna = getUserName();
	$jsetor = $_REQUEST['jsetor'];
	$keterangansetor = $_REQUEST['keterangan'];
	$errmsg = "";
    
    //Ambil nama siswa

    $sql = "SELECT nama FROM jbsakad.siswa WHERE nis = '$nis'";
    $row = FetchSingleRow($sql);
    $namasiswa = $row[0];
    
    //Ambil awalan dan cacah tahunbuku untuk bikin nokas;
    $idtahunbuku = $_REQUEST['idtahunbuku'];
    $sql = "SELECT awalan, cacah FROM tahunbuku WHERE replid = '$idtahunbuku'";
    $row = FetchSingleRow($sql);
    $awalan = $row[0];
    $cacah = $row[1];
    
    $cacah += 1; // Increment cacah
    $nokas = $awalan . rpad($cacah, "0", 6); // Form nomor kas
        
    // tanggal & petugas pendata & keterangan
    $tsetor = date("Y-m-d");
    $idpetugas = getIdUser();
    $petugas = getUserName();
    $keterangan = "Setoran Tabungan $namatabungan siswa $namasiswa ($nis)";
    $ketsms = "Setoran Tabungan $namatabungan";

    $success = true;
    BeginTrans();
    
    // simpan ke table jurnal
    $idjurnal = 0;
    if ($success)
        $success = SimpanJurnal($idtahunbuku, $tsetor, $keterangan, $nokas, "", $idpetugas, $petugas, "setorantabungan", $idjurnal);
    
    // simpan ke tabel tabungan
    if ($success) 
    {
        $sql = "INSERT INTO tabungan
                   SET nis='$nis', idtabungan='$idtabungan', debet='0', kredit='$jsetor',
                       keterangan = '" . CQ($keterangansetor) . "', 
                       petugas='$idpetugas', idjurnal='$idjurnal', tanggal=NOW()";		
        QueryDbTrans($sql, $success);
    }
    // simpan ke table jurnaldetail
    if ($success) 
        $success = SimpanDetailJurnal($idjurnal, "D", $rekkas, $jsetor);
        
    if ($success) 
        $success = SimpanDetailJurnal($idjurnal, "K", $rekutang, $jsetor);
        
    //increment cacah di tahunbuku
    if ($success) 
    {
        $sql = "UPDATE tahunbuku SET cacah=cacah+1 WHERE replid=$idtahunbuku";
        QueryDbTrans($sql, $success);
    }
    
    // -- Kirim SMS Informasi Pembayaran Siswa
    if ($success && $smsinfo == 1)
    {
        $sql = "SELECT departemen
                  FROM jbsfina.tahunbuku
                 WHERE replid = '$idtahunbuku'";
        $departemen = FetchSingle($sql);

        $jsaldo = $jsaldo + $jsetor;
        
        CreateSMSTabungan('SISTAB',
                           $departemen, $nis, $namasiswa,
                           RegularDateFormat($tsetor),
                           FormatRupiah($jsetor),
                           FormatRupiah($jsaldo),
                           $ketsms,
                           $keterangansetor,
                           $success);
    }
    
    if ($success) 
        CommitTrans();				
    else 
        RollbackTrans();
        
    CloseDb();
    
    $r = rand(10000, 99999);		
	header("Location: tabungan.trans.input.php?r=$r&idtabungan=$idtabungan&nis=$nis&idtahunbuku=$idtahunbuku&errmsg=$errmsg&jsetor=$jsetor&keterangansetor=$keterangansetor");
	
	exit();    
}



?>