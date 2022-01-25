<?php   
     include "../../../conn.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slip Pembayaran SPP</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h3>SMK Telkom Malang<b><br/>LAPORAN PEMBAYARAN SPP</b></h3>
	<br/>
	<hr/>

	<?php 
	$siswa = mysqli_query($conn, "select * from siswa join kelas on siswa.id_kelas=kelas.id_kelas where nisn = '".$_GET['nisn']."'");
	$sw = mysqli_fetch_assoc($siswa);
	?>

	<table>
		<tr>
			<td>Nama Siswa </td>
			<td>:</td>
			<td> <?= $sw['nama'] ?></td>
		</tr>
		<tr>
			<td>NISN </td>
			<td>:</td>
			<td> <?= $sw['nisn'] ?></td>
		</tr>
		<tr>
			<td>Kelas </td>
			<td>:</td>
			<td> <?= $sw['nama_kelas'] ?></td>
		</tr>
	</table>
	<hr>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>NISN</th>
		<th>ID PEMBAYARAN</th>
		<th>PEMBAYARAN BULAN</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>

	<?php 
	$id_pembayaran = $_GET['id_pembayaran'];
	$spp = mysqli_query($conn, "select * from pembayaran join spp on pembayaran.id_spp=spp.id_spp where tgl_bayar is not null and id_pembayaran = '".$id_pembayaran."'");
	$i=1;
	$total = 0;
	while($dta=mysqli_fetch_assoc($spp)) :
	?>
	
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['nisn'] ?></td>
		<td align=""><?= $dta['id_pembayaran'] ?></td>
		<td align=""><?= $dta['bulan_spp'] ?></td>
		<td align="right"><?= $dta['nominal'] ?></td>
		<td align="center">
			<?php 
				if($dta['tgl_bayar']!= NULL){
					echo "LUNAS";
				}else{
					echo "BELUM LUNAS";
				}
			?>
		</td>
	</tr>
	<?php $i++; ?>
	

<?php endwhile; ?>

	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Malang, <?= date('d/m/y') ?> <br/>
				Admin,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>
