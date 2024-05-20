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
class CFormatEdit{
	var $kode, $nama, $replid, $keterangan;
	function OnStart(){
		if (isset($_REQUEST[simpan])){
			$sql = "SELECT kode FROM format WHERE kode='".CQ($_REQUEST['kode'])."' AND replid <> '$_REQUEST[replid]'";
			$result = QueryDb($sql);
			$num = @mysql_num_rows($result);
			if ($num>0){
				$this->exist();
			} else {
				$sql = "UPDATE format SET kode='".CQ($_REQUEST['kode'])."', nama='".CQ($_REQUEST['nama'])."', keterangan='".CQ($_REQUEST['keterangan'])."' WHERE replid='$_REQUEST[replid]'";
				$result = QueryDb($sql);
				if ($result)
					$this->success();
			}
		} else {
			$sql = "SELECT * FROM format WHERE replid='$_REQUEST[id]'";
			$result = QueryDb($sql);
			$row = @mysql_fetch_array($result);
			$this->replid = $_REQUEST[id];
			$this->kode = $row[kode];
			$this->nama = $row[nama];
			$this->keterangan = $row[keterangan];
		}
	}
	function exist(){
		?>
        <script language="javascript">
			alert('Kode sudah digunakan!');
			document.location.href="format.edit.php?id=<?=$_REQUEST[replid]?>";
		</script>
        <?
	}
	function success(){
		?>
        <script language="javascript">
			parent.opener.getfresh();
			window.close();
        </script>
        <?
	}
	function edit(){
		?>
        <form name="editformat" onSubmit="return validate()">
        <input name="replid" type="hidden" id="replid" value="<?=$this->replid?>">
		<table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td colspan="2" align="left">
            	<font style="color:#FF9900; font-size:30px;"><strong>.:</strong></font>
        		<font style="font-size:18px; color:#999999">Ubah Format Pustaka</font>            </td>
  		  </tr>
          <tr>
            <td width="6%">&nbsp;<strong>Kode</strong></td>
            <td width="94%"><input name="kode" type="text" class="inputtxt" id="kode" value="<?=$this->kode?>"  maxlength="3" size="3"></td>
          </tr>
          <tr>
            <td>&nbsp;<strong>Nama</strong></td>
            <td><input name="nama" type="text" class="inputtxt" id="nama" value="<?=$this->nama?>"></td>
          </tr>
          <tr>
            <td>&nbsp;Keterangan</td>
            <td><textarea name="keterangan" cols="45" rows="5" class="areatxt" id="keterangan"><?=$this->keterangan?></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" class="cmbfrm2" name="simpan" value="Simpan" >&nbsp;<input type="button" class="cmbfrm2" name="batal" value="Batal" onClick="window.close()" ></td>
          </tr>
        </table>
		</form>
		<?
	}
}
?>