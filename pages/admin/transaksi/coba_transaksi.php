<?php 
include '../../../conn.php';
// include 'header.php';

 ?>
 <div class="container">
	<div class="page-header">
<h2>CARI SISWA BERDASARKAN NIS</h2>
	</div>
 <form action="" method="get">
 	<table class="table">
 		<tr>
 			<td>NISN</td>
 			<td>:</td>
 			<td>
 				<input class="form-control" type="text" name="nisn">
 			</td>
 			<td>
 				<button class="btn btn-success" type="submit" name="cari">Cari</button>
 			</td>
 		</tr>
 		
 	</table>
 </form>
<?php 
if (isset($_GET['nisn']) && $_GET['nisn'] != ''){
	$data = $conn->query("SELECT * FROM kelas join siswa WHERE nisn = '$_GET[nisn]'");
	$dta = mysqli_fetch_assoc($data);
	$nisn = $dta['nisn'];

?>
<div class="panel panel-info">
	<div class="panel-heading">
<h3>biodata siswa</h3>
</div>
<div class="panel panel-body">
	<table class="table table-bordered table-striped">
		<tr>
			<td>NIS</td>
			<td><?= $dta['nisn'] ?></td>
		</tr>
		<tr>
			<td>Nama Siswa</td>
			<td><?= $dta['nama'] ?></td>
		</tr>
		<tr>
			<td>Nama Kelas</td>
			<td><?= $dta['nama_kelas'] ?></td>
		</tr>
	</table>
</div>
</div>

<div style="margin-right: 2%; margin-left: 2%">
<h2 style="text-align: center"><strong>Tagihan SPP Siswa</strong></h2>
<br>
<div class="table-responsive">
<table class="table">
    <thead style = "text-align: center;">
        <th>NO</th>
        <th>Bulan</th>
        <th>Jatuh Tempo</th>
        <th>Tanggal Bayar</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th colspan="2">Bayar</th>
    </thead>
    <tbody>
        <?php 
        $qry_transaksi=mysqli_query($conn, "select * from pembayaran order by nisn desc");
        $no=0;
        while($dt_histori=mysqli_fetch_array($qry_transaksi)){
            $no++;
            
            //menampilkan tagihan spp
            $tagihan="<ol>";
            $qry_spp=mysqli_query($conn,"select * from pembayaran join spp on spp.id_spp=pembayaran.id_spp where nisn = '".$dt_histori['nisn']."'");
            while($dt_comic=mysqli_fetch_array($qry_comic)){
                $comic_dibeli.="<li>".$dt_comic['judul']."</li>";
            }
            $comic_dibeli.="</ol>";
            //menampilkan status sudah datang atau belum
            $qry_cek_datang=mysqli_query($conn,"select * from kedatangan_comic where id_pembelian_comic = '".$dt_histori['id_pembelian_comic']."'");
            if(mysqli_num_rows($qry_cek_datang)>0){
                $dt_datang=mysqli_fetch_array($qry_cek_datang);
                $status_datang="<label class='alert alert-success'>Sudah datang <br></label>";
                $button_datang="";
            } else {
                $status_datang="<label class='alert alert-danger'>Belum datang</label>";
                $button_datang="<a href='datang.php?id=".$dt_histori['id_pembelian_comic']."' class='btn btn-warning' onclick='return confirm(\"apakah anda yakin comic sudah datang?\")'>Konfirmasi</a>";
            }
        ?>
        <tr style="color: #FFEBC9">
            <td ><?=$no?></td>
            <td style = "text-align: center;">INVOICE <?php echo $dt_histori['id_pembelian_comic']?></td>
            <td style = "text-align: center;"><?=$dt_histori['tanggal_beli']?></td>
            <td style = "text-align: center;"><?=$dt_histori['tanggal_datang']?></td>
            <td style = "text-align: center;"><?=$comic_dibeli?></td>
            <td style = "text-align: center;"><?=$status_datang?></td>
            <td style = "text-align: center;"><a href="../src/invoice/transaksi_invoice.php?id=<?php echo $dt_histori['id_pembelian_comic'] ?>" target="_blank" class="btn btn-sm btn-secondary">Invoice</a></td>
            <td><?=$button_datang?></td>            
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>
</div>
<?php 
}
?>
<p style="color: red;">Pembayaran dilakukan dengan cara mencari tagihan siswa berdasarkan NIS </p>